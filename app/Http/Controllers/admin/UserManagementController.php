<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth'); 
        
    }
    public function index(){
        $data['title']='User Lists';
        $data['users']=User::where('user_type','user')->get();
        return view('admin.pages.user.list',$data);
    }


    public function user_add(){
        $data['title']='User add';
        $data['users']=User::where('user_type','user')->get();
        return view('admin.pages.user.users_add',$data);
    }



}

