<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\BrrowersLoanDetails;

use App\Models\Market;
use DB;

class DemandSheetController extends Controller
{

    public function index(Request $request)
    {
        // Fetch all markets for the dropdown
        $data['markets'] = Market::all();

        // Get filter values from the request
        $marketId = $request->get('market');
        $fromDate = $request->get('form_date');
        $toDate = $request->get('to_date');

        // Base query with left joins
        $query = DB::table('brrowers_loan_details')
                    ->leftJoin('users', 'users.id', '=', 'brrowers_loan_details.user_id')
                    ->leftJoin(DB::raw('(SELECT trans_loan_id, SUM(trans_emi_amount) as emi_paid FROM transactions GROUP BY trans_loan_id) as trn'), 'trn.trans_loan_id', '=', 'brrowers_loan_details.id')
                    ->select('brrowers_loan_details.*', 'users.first_name', 'users.last_name', 'trn.emi_paid', DB::raw('brrowers_loan_details.total_amount - trn.emi_paid as due_amount'))
                    ->where('users.user_type', '=', 'brrowers')
                    ;

        // Apply filters if set
        if ($marketId) {
            $query->where('brrowers_loan_details.market_id', $marketId);
        }
        if ($fromDate) {
            $query->whereDate('brrowers_loan_details.created_at', '>=', $fromDate);
        }
        if ($toDate) {
            $query->whereDate('brrowers_loan_details.created_at', '<=', $toDate);
        }

        // Execute query and add results to data array
        $data['results'] = $query->get();

        return view('admin.pages.demandsheet.index', $data);
    }

}
