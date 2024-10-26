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
}
