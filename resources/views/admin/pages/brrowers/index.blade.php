@extends('admin.layouts.main')

@section('content')
<div class="right_part">
    <h3 class="pageTitlw">Borrowers</h3>

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
                        <td>{{ $loanDetail->principle_amount ?? 'N/A' }}</td>
                        <td>{{ $loanDetail->market->market_name ?? 'N/A' }}</td>
                        <td>{{ $loanDetail->status ?? 'N/A' }}</td>
                        <td>
                            <ul class="actn">
                                <li><a href="#"><span class="material-symbols-outlined">edit</span></a></li>
                                <li><a href="#"><span class="material-symbols-outlined">check_circle</span></a></li>
                                <li>
                                    <a href="#" 
                                       onclick="event.preventDefault(); document.getElementById('delete-form-{{ $loanDetail->id }}').submit();">
                                       <span class="material-symbols-outlined">delete</span>
                                    </a>
                                </li>
                                <form id="delete-form-{{ $loanDetail->id }}" action="#" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
