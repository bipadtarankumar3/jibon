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
                @foreach ($brrowers as $brrower)
                    <tr>
                        <td>{{ $brrower->first_name }} {{ $brrower->last_name }}</td>
                        <td>{{ $brrower->contact_number }}</td>
                        <td>{{ $brrower->created_at->format('d/m/Y') }}</td>
                        <td>
                            @php
                                // Fetch the loan amount for the first loan detail if exists
                                $loanDetail = $brrower->loanDetails->first();
                                $loanAmount = $loanDetail ? $loanDetail->principle_amount : 'N/A';
                            @endphp
                            {{ $loanAmount }}
                        </td>
                        <td>
                            @php
                                // Fetch the market name using the relationship safely
                                $marketName = $loanDetail && $loanDetail->market ? $loanDetail->market->market_name : 'N/A';
                            @endphp
                            {{ $marketName }}
                        </td>
                        <td>
                            @php
                                // Check status based on loan details or other logic
                                $status = $loanDetail ? $loanDetail->status : 'N/A';
                            @endphp
                            {{ $status }}
                        </td>
                        <td>
                            <ul class="actn">
                                <li><a href="#"><span class="material-symbols-outlined">edit</span></a></li>
                                <li><a href="#"><span class="material-symbols-outlined">check_circle</span></a></li>
                                <li>
                                    <a href="#" 
                                       onclick="event.preventDefault(); document.getElementById('delete-form-{{ $brrower->id }}').submit();">
                                       <span class="material-symbols-outlined">delete</span>
                                    </a>
                                </li>
                                <form id="delete-form-{{ $brrower->id }}" action="#" method="POST" style="display: none;">
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
