<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function transactions()
    {

        return view('admin.pages.transaction.transaction');
    }
    public function set_transaction()
    {

        return view('admin.pages.transaction.set_transaction');
    }
}
