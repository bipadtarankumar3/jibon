<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Models\BrrowersAddress;
use App\Models\BrrowersLoanDetails;
use App\Models\Documents;
use App\Models\LoanType;
use App\Models\Market;
use App\Models\Emi;
use App\Models\Wallet;
use App\Models\Transaction;

class AdminAuthController extends Controller
{
    public function login(){
        return view('admin.Auth.login');
    }
    
    public function backToAdmin(){
       $user=User::where('email',Session::get('email'))->first();
       Auth::login($user);
       return redirect('admin/dashboard'); 
    }
    public function adminLoginAction(Request $request){
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            if(Auth::user()->user_type=="admin"){
                return redirect('admin/dashboard'); 
            }else{
                 $request->session()->flash('success', 'Login Success');
                return redirect('vendor/dashboard');  
            }
               
           
        } else {
            $request->session()->flash('error', 'You have entered wrong Email or Password.');
            return redirect()->back();
        }
    }
    public function dashboard()
    {
        // Existing data
        $data['wallet'] = Wallet::sum('amount');
        $data['brrowers'] = User::where('user_type', 'brrowers')->count();
        $data['loans'] = BrrowersLoanDetails::count();
        $data['outstanding'] = BrrowersLoanDetails::sum('total_amount');
        $data['todayEmi'] = Emi::whereDate('emi_date', date('Y-m-d'))->sum('emi_amount');
        $data['pendingEmi'] = Emi::where('status', 'due')->sum('emi_amount');

        // Get start and end dates for the current week
        $today = new \DateTime();
        $dayOfWeek = $today->format('N'); // 1 (for Monday) through 7 (for Sunday)

        $startOfWeek = (clone $today)->modify('-' . ($dayOfWeek - 1) . ' days')->format('Y-m-d');
        $endOfWeek = (clone $today)->modify('+' . (7 - $dayOfWeek) . ' days')->format('Y-m-d');


        // Weekly EMI and Pending EMI
        $data['weeklyEmi'] = Transaction::whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('trans_emi_amount');

        $data['weeklyPendingEmi'] = Emi::whereBetween('emi_date', [$startOfWeek, $endOfWeek])
                                        ->where('status', 'due')
                                        ->sum('emi_amount');

        // Get start and end dates for the current month
        $startOfMonth = $today->format('Y-m-01');
        $endOfMonth = $today->format('Y-m-t'); // t gives the last day of the month

        // Monthly EMI and Pending EMI
        $data['monthlyEmi'] = Transaction::whereBetween('created_at', [$startOfMonth, $endOfMonth])->sum('trans_emi_amount');
        
        $data['monthlyPendingEmi'] = Emi::whereBetween('emi_date', [$startOfMonth, $endOfMonth])
                                        ->where('status', 'due')
                                        ->sum('emi_amount');

        return view('admin.pages.dashboard.dashboard', $data);
    }

    public function profile(){
        return view('admin.auth.profile');
    }
    public function backup_database()
    {
        $database = env('DB_DATABASE');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $host = env('DB_HOST');
        $filename = "backup-" . date('Y-m-d_H-i-s') . ".sql";
        $path = public_path($filename);
    
        // Path to mysqldump on XAMPP (Windows)
        $mysqldumpPath = 'C:\xampp\mysql\bin\mysqldump.exe';
    
        // Construct the mysqldump command
        $command = "\"{$mysqldumpPath}\" --user={$username} --password={$password} --host={$host} {$database} > \"{$path}\"";
    
        // Execute the command and capture output and result code
        $output = [];
        $result = null;
        exec($command, $output, $result);
    
        if ($result !== 0) {
            return back()->with('error', 'Database backup failed.');
        }
    
        // Set a success flash message
        session()->flash('success', 'Database backup successful.');
    
        // Return the backup file as a downloadable response and delete after sending
        return response()->download($path)->deleteFileAfterSend(true);
    }
    
    
    


    public function logout(Request $request){
        Auth::logout();


     $request->session()->flash('error','loged out');
     return redirect('login');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return back()->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password changed successfully.');
    }

 

}
