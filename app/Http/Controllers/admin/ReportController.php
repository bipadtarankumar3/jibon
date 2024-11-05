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

    public function dailyReports(Request $request)
    {

        $data['transactions'] = collect();

        // Check if either form_date or to_date is provided
        if (isset($_GET['form_date']) || isset($_GET['to_date'])) {

            $form_date = $_GET['form_date'];
            $to_date = $_GET['to_date'];

            $data['transactions'] = DB::select("
                WITH RECURSIVE date_series AS (
                    SELECT '$form_date' AS date
                    UNION ALL
                    SELECT DATE_ADD(date, INTERVAL 1 DAY)
                    FROM date_series
                    WHERE date < '$to_date'
                ),

                market_in AS (
                    SELECT DATE(approve_date) AS date, COUNT(DISTINCT approve_date) AS market_in
                    FROM brrowers_loan_details
                    GROUP BY DATE(approve_date)
                ),

                market_out AS (
                    SELECT DATE(maturity_date) AS date, COUNT(DISTINCT maturity_date) AS market_out
                    FROM brrowers_loan_details
                    GROUP BY DATE(maturity_date)
                ),

                final_paid_market_out AS (
                    SELECT DATE(maturity_date) AS date, COUNT(DISTINCT maturity_date) AS market_out_paid
                    FROM brrowers_loan_details
                    WHERE final_paid = 'Paid'
                    GROUP BY DATE(maturity_date)
                ),

                user_counts AS (
                    SELECT DATE(created_at) AS date, COUNT(*) AS number_of_users
                    FROM users
                    WHERE user_type = 'brrowers'
                    GROUP BY DATE(created_at)
                ),

                emi_counts AS (
                    SELECT DATE(emi_date) AS date, COUNT(*) AS exist_member
                    FROM emis
                    GROUP BY emis.user_id, DATE(emi_date)
                ),

                loan_amounts AS (
                    SELECT DATE(approve_date) AS date, SUM(principle_amount) AS loan_amount
                    FROM brrowers_loan_details
                    WHERE approve_date IS NOT NULL
                    GROUP BY DATE(approve_date)
                ),

                interest AS (
                    SELECT DATE(approve_date) AS date, SUM(total_amount) - SUM(principle_amount) AS interest
                    FROM brrowers_loan_details
                    WHERE approve_date IS NOT NULL
                    GROUP BY DATE(approve_date)
                ),

                collections AS (
                    SELECT DATE(payment_date) AS date, SUM(trans_emi_amount) AS collection
                    FROM transactions
                    GROUP BY DATE(payment_date)
                )

                SELECT 
                    ds.date,
                    COALESCE(mi.market_in, 0) AS market_in,
                    COALESCE(mo.market_out, 0) AS market_out,
                    COALESCE(mo_paid.market_out_paid, 0) AS market_out_paid,
                    COALESCE(uc.number_of_users, 0) AS number_of_users,
                    COALESCE(ec.exist_member, 0) AS exist_member,
                    COALESCE(la.loan_amount, 0) AS loan_amount,
                    COALESCE(i.interest, 0) AS interest,
                    COALESCE(c.collection, 0) AS collection
                FROM 
                    date_series ds
                LEFT JOIN 
                    market_in mi ON ds.date = mi.date
                LEFT JOIN 
                    market_out mo ON ds.date = mo.date
                LEFT JOIN 
                    final_paid_market_out mo_paid ON ds.date = mo_paid.date
                LEFT JOIN 
                    user_counts uc ON ds.date = uc.date
                LEFT JOIN 
                    emi_counts ec ON ds.date = ec.date
                LEFT JOIN 
                    loan_amounts la ON ds.date = la.date
                LEFT JOIN 
                    interest i ON ds.date = i.date
                LEFT JOIN 
                    collections c ON ds.date = c.date
                ORDER BY 
                    ds.date;

            ");
        }
    
        return view('admin.pages.reports.dailyReports', $data);
    }
    
}
