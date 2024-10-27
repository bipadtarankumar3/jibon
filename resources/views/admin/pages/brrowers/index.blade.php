@extends('admin.layouts.main')

@section('content')
<div class="right_part">
    <h3 class="pageTitle">Borrowers</h3>

    <div class="money_table">
        <div class="text-end mb-3">
            <a class="common_btn" href="{{ route('admin.brrowers.create') }}">Add Borrower</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Contact Number</th>
                    <th>Date</th>
                    <th>Loan Amount</th>
                    <th>Market</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($loanDetails as $loanDetail)
                    <tr>
                        <td>{{ $loanDetail->user->first_name ?? 'N/A' }} {{ $loanDetail->user->last_name ?? '' }}</td>
                        <td>{{ $loanDetail->user->contact_number ?? 'N/A' }}</td>
                        <td>{{ $loanDetail->created_at->format('d/m/Y') }}</td>
                        <td>{{ $loanDetail->total_amount ?? 'N/A' }}</td>
                        <td>{{ $loanDetail->market->market_name ?? 'N/A' }}</td>
                        <td>{{ $loanDetail->status ?? 'N/A' }}</td>
                        <td>
                            <ul class="actn">
                                <li><a href="{{ route('admin.edit_brrower', $loanDetail->id) }}"><span class="material-symbols-outlined">edit</span></a></li>
                                <li>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#approveModal-{{ $loanDetail->id }}">
                                       <span class="material-symbols-outlined">check_circle</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.brrowers.destroy', $loanDetail->id) }}"><span class="material-symbols-outlined">delete</span></a>
                                </li>
                                
                            </ul>
                        </td>
                    </tr>

                    <!-- Approve Loan Modal for each loanDetail -->
                    <div class="modal fade" id="approveModal-{{ $loanDetail->id }}" tabindex="-1" aria-labelledby="approveModalLabel-{{ $loanDetail->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form id="approveForm-{{ $loanDetail->id }}" method="POST" action="{{ route('admin.brrowers.approve') }}">
                                    @csrf
                                    <input type="hidden" name="loan_detail_id" value="{{ $loanDetail->id }}">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="approveModalLabel-{{ $loanDetail->id }}">Approve Loan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="approval_date" class="form-label">Approval Date</label>
                                            <input type="date" class="form-control" id="approval_date-{{ $loanDetail->id }}" name="approval_date" 
                                                   value="{{ date('Y-m-d') }}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Approve Loan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
