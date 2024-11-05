<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BrrowersLoanDetails;

use App\Models\Market;

class LoanController extends Controller
{
    
    public function loans()
    {
        $data['markets'] = Market::all();

       $data['loanDetails'] = BrrowersLoanDetails::with(['user', 'market']) // Eager load related models
            ->whereHas('user', function ($query) {
                $query->where('user_type', 'brrowers');
            });

        if (isset($_GET['market'])) {
            $data['loanDetails'] = $data['loanDetails']->where('market_id', $_GET['market']);
        }

        $data['loanDetails'] = $data['loanDetails']->orderBy('id', 'desc')->get();


        return view('admin.pages.loan.loan',$data);
    }
    
    public function loans_details($id)
    {
        $data['markets'] = Market::all();
    
        $data['loanDetails'] = BrrowersLoanDetails::where('id', $id)
            ->with(['user', 'market', 'transactions', 'emi','address'])
            ->whereHas('user', function ($query) {
                $query->where('user_type', 'brrowers');
            })->first();
    
        // Calculate the sum of trans_emi_amount in the transactions relationship
        $data['trans_emi_amount_sum'] = $data['loanDetails']->transactions->sum('trans_emi_amount');
    
        return view('admin.pages.loan.loans_details', $data);
    }
    
}
