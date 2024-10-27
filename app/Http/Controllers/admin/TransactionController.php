<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BrrowersLoanDetails;
use App\Models\Emi;
use App\Models\Transaction;

use App\Models\Market;
use DB;

class TransactionController extends Controller
{
    public function transactions()
    {

        $data['markets'] = Market::all();
        $date = date('Y-m-d');

        $data['emi'] = Emi::select('emis.*', 'brrowers_loan_details.loan_unique_id', 'brrowers_loan_details.total_amount', 'users.first_name', 'users.last_name')
            ->join('brrowers_loan_details', 'brrowers_loan_details.id', 'emis.loan_id')
            ->join('users', 'users.id', 'emis.user_id');

        if (isset($_GET['market'])) {
            $data['emi'] = $data['emi']
                ->where('brrowers_loan_details.market_id', $_GET['market']) // Specify table name for `market_id`
                ->whereDate('emi_date', $date); // Add date filter
        } else {
            $data['emi'] = $data['emi']->whereDate('emi_date', $date);
        }
        $data['emi'] = $data['emi']->where('emis.status', 'due');
        $data['emi'] = $data['emi']->get();

        

        return view('admin.pages.transaction.transaction',$data);
    }

    public function final_paid(){

      
        $final_paid = BrrowersLoanDetails::where('final_paid',"Paid")->with(['user', 'market']) // Eager load related models
        ->whereHas('user', function ($query) {
            $query->where('user_type', 'brrowers');
        })
        ->orderBy('id', 'desc')
        ->get();
        return view('admin.pages.transaction.final_paid',compact('final_paid'));
    }
    public function drop_out(){

      
        $final_paid = BrrowersLoanDetails::where('drop_out',"Drop Out")->with(['user', 'market']) // Eager load related models
        ->whereHas('user', function ($query) {
            $query->where('user_type', 'brrowers');
        })
        ->orderBy('id', 'desc')
        ->get();
        return view('admin.pages.transaction.drop_out',compact('final_paid'));
    }


    public function add_transaction(Request $request)
    {

        // dd($request->all());

        $date = now(); // Or use a specific date if needed

        $emi_id = $request->emi_id;
        $amount = $request->amount;



        foreach ($emi_id as $key => $value) {
            // Only process if the checkbox is checked
            if ($value) {
    
                $emi = Emi::select('emis.*', 'brrowers_loan_details.loan_unique_id', 'brrowers_loan_details.total_amount', 'users.first_name', 'users.last_name')
                ->join('brrowers_loan_details', 'brrowers_loan_details.id', 'emis.loan_id')
                ->join('users', 'users.id', 'emis.user_id')
                ->where('emis.id',$value)
                ->first();

                // Insert the transaction record
                DB::table('transactions')->insert([
                    'trans_user_id' => $emi->user_id, // Or any other user ID
                    'trans_loan_id' => $emi->loan_id,
                    'trans_emi_id' => $value,
                    'trans_emi_amount' => $amount[$key],
                    'payment_date' => $date,
                    'status' => 'pending', // Update status if needed
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                Emi::where('id',$value)->update(['status'=>'paid']);
            }
        }

        return redirect()->back()->with('success', 'Transactions saved successfully.');
    }


    public function set_transaction()
    {

        return view('admin.pages.transaction.set_transaction');
    }


}
