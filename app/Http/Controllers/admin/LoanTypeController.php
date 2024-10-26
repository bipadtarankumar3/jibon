<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\LoanType;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;
use League\CommonMark\Node\Block\Document;

class LoanTypeController extends Controller
{
    public function loan_types()
    {
        $loanTypes = LoanType::all();
        return view('admin.pages.loan_type.loan_type', compact('loanTypes'));
    }

    public function store(Request $request)
{
    $request->validate([
        'type_name' => 'required|string|max:255',
        'interest' => 'required|numeric',
        'loan_terms' => 'required|integer',
        'day_month_type' => 'required|string',
    ]);

    LoanType::create([
        'type_name' => $request->type_name,
        'interest' => $request->interest,
        'loan_terms' => $request->loan_terms,
        'day_month_type' => $request->day_month_type,
    ]);

    return redirect()->back()->with('success', 'Loan type created successfully.');
}

public function update(Request $request, $id)
{
    // dd($id);

    $request->validate([
        'type_name' => 'required|string|max:255',
        'interest' => 'required|numeric',
        'loan_terms' => 'required|integer',
        'day_month_type' => 'required|string',
    ]);

    $loanType = LoanType::findOrFail($id);
    $loanType->update([
        'type_name' => $request->type_name,
        'interest' => $request->interest,
        'loan_terms' => $request->loan_terms,
        'day_month_type' => $request->day_month_type,
    ]);

    return redirect()->back()->with('success', 'Loan type updated successfully.');
}

public function destroy($id)
{
    LoanType::findOrFail($id)->delete();
    return redirect()->back()->with('success', 'Loan type deleted successfully.');
}

}
