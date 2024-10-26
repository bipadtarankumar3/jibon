<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrrowersController extends Controller
{
    public function index(){
        return view('admin.pages.brrowers.index');
    }
    public function create(){
        return view('admin.pages.brrowers.create');
    }
}
