<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\BrrowersLoanDetails;
use App\Models\Emi;
use App\Models\Transaction;

use App\Models\Market;
use DB;

class ReportController extends Controller
{
    public function reports()
    {
        // Initialize an empty transactions collection
        $data['transactions'] = collect();
    
        // Check if either form_date or to_date is provided
        if (isset($_GET['form_date']) || isset($_GET['to_date'])) {
            $data['transactions'] = Transaction::select(
                'transactions.*', 
                'brrowers_loan_details.loan_unique_id', 
                'brrowers_loan_details.total_amount', 
                'users.first_name', 
                'users.last_name',
                'markets.market_name'
            )
            ->join('brrowers_loan_details', 'brrowers_loan_details.id', 'transactions.trans_loan_id')
            ->join('markets', 'markets.id', 'brrowers_loan_details.market_id')
            ->join('users', 'users.id', 'transactions.trans_user_id');
    
            // Apply date filters
            if (isset($_GET['form_date']) && isset($_GET['to_date'])) {
                $data['transactions'] = $data['transactions']->whereBetween('transactions.created_at', [$_GET['form_date'], $_GET['to_date']]);
            } elseif (isset($_GET['form_date'])) {
                $data['transactions'] = $data['transactions']->whereDate('transactions.created_at', '>=', $_GET['form_date']);
            } elseif (isset($_GET['to_date'])) {
                $data['transactions'] = $data['transactions']->whereDate('transactions.created_at', '<=', $_GET['to_date']);
            }
    
            $data['transactions'] = $data['transactions']->get();
        }
    
        return view('admin.pages.reports.report', $data);
    }
    
}
