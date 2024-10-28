<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class UserManagementController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth'); 
        
    }
    public function index(){
        $data['title']='User Lists';
        $data['users']=User::where('user_type','!=','admin')->get();
        return view('admin.pages.user.list',$data);
    }


    public function user_add(){
        $data['title']='User add';
        $data['users']=User::where('user_type','user')->get();
        return view('admin.pages.user.users_add',$data);
    }


        public function store(Request $request)
        {
            // Validate input
            $request->validate([
                'username' => 'required|string|max:255|unique:users,username',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email',
                'password' => 'required|string',
                'confirm_password' => 'required|same:password',
                'user_type' => 'required|string',
                'address' => 'nullable|string',
                //'profileimg' => 'nullable|string', // Validate the base64 image if present
                //'avater_file' => 'nullable|image|mimes:jpg,jpeg,png' // Validate the uploaded file if exists
            ]);
        
            // Initialize avatar path
            $avatarPath = null;
        
            // Process the Base64 image
            if ($request->has('profileimg')) {
                // Remove the "data:image/jpeg;base64," part if it exists
                $base64Str = preg_replace('#^data:image/\w+;base64,#i', '', $request->profileimg);
                
                // Decode the Base64 string
                $imageData = base64_decode($base64Str);
            
                // Generate a unique filename
                $profileImgName = Str::uuid() . '.jpg'; // or .jpeg
            
                // Define the path where you want to save the image
                $profileImgPath = public_path('images/profile_images/' . $profileImgName);
            
                // Check if the directory exists, if not, create it
                $directoryPath = public_path('images/profile_images');
                if (!File::exists($directoryPath)) {
                    File::makeDirectory($directoryPath, 0755, true); // Create the directory with proper permissions
                }
            
                // Save the image to the specified path
                file_put_contents($profileImgPath, $imageData);
            
                // Save the path for later use
                $avatarPath = '/images/profile_images/' . $profileImgName; // Adjust path as needed
            }

            // dd($avatarPath);
            $avatarFilePath = null;
            // Handle the uploaded file if it exists
            if ($request->hasFile('avater_file')) {
                $thumbnail = $request->file('avater_file');
                $thumbnailName = Str::uuid() . '_' . $thumbnail->getClientOriginalName(); // Unique filename
                $avatarFilePath = '/images/avatar/' . $thumbnailName; // Adjust path as needed
                $thumbnail->move(public_path('images/avatar'), $thumbnailName); // Save the uploaded file
            }
        
            // Create the user
            User::create([
                'username' => $request->username,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_type' => $request->user_type,
                'address' => $request->address,
                'avater' => $avatarPath, // Save the path to the avatar
                'avater_file' => $avatarFilePath, // Save the path to the avatar
            ]);
        
            return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
        }
        
    
        // Show the form for editing the specified user
        public function edit($id)
        {
            $user = User::findOrFail($id);
            return view('admin.pages.user.users_add', compact('user'));
        }
    
        // Update the specified user
        public function update(Request $request, $id)
        {
            $user = User::findOrFail($id);
    
            $request->validate([
                'username' => 'required|string|max:255',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email',
                
                'user_type' => 'required|string',
                'address' => 'nullable|string',
                //'profileimg' => 'nullable|string', // Validate the base64 image if present
                //'avater_file' => 'nullable|image|mimes:jpg,jpeg,png' // Validate the uploaded file if exists
            ]);
    
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->user_type = $request->user_type;
            $user->address = $request->address;
    
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            // Initialize avatar path
            $avatarPath = null;
        
            // Process the Base64 image
            if ($request->has('profileimg')) {
                // Remove the "data:image/jpeg;base64," part if it exists
                $base64Str = preg_replace('#^data:image/\w+;base64,#i', '', $request->profileimg);
                
                // Decode the Base64 string
                $imageData = base64_decode($base64Str);
            
                // Generate a unique filename
                $profileImgName = Str::uuid() . '.jpg'; // or .jpeg
            
                // Define the path where you want to save the image
                $profileImgPath = public_path('images/profile_images/' . $profileImgName);
            
                // Check if the directory exists, if not, create it
                $directoryPath = public_path('images/profile_images');
                if (!File::exists($directoryPath)) {
                    File::makeDirectory($directoryPath, 0755, true); // Create the directory with proper permissions
                }
            
                // Save the image to the specified path
                file_put_contents($profileImgPath, $imageData);
            
                // Save the path for later use
                $avatarPath = '/images/profile_images/' . $profileImgName; // Adjust path as needed
                $user->avater = $avatarPath;
            }

            // dd($avatarPath);
            $avatarFilePath = null;
            // Handle the uploaded file if it exists
            if ($request->hasFile('avater_file')) {
                $thumbnail = $request->file('avater_file');
                $thumbnailName = Str::uuid() . '_' . $thumbnail->getClientOriginalName(); // Unique filename
                $avatarFilePath = '/images/avatar/' . $thumbnailName; // Adjust path as needed
                $thumbnail->move(public_path('images/avatar'), $thumbnailName); // Save the uploaded file
                $user->avater_file = $avatarFilePath;
            }
        
    
            $user->save();
    
            return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
        }
    
        // Remove the specified user
        public function destroy($id)
        {
            User::destroy($id);
            return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
        }



}

