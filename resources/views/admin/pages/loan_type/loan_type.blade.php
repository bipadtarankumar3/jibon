@extends('admin.layouts.main')

@section('content')
<div class="right_part">
    <h3 class="pageTitlw">Type of Loans</h3>

    <div class="money_table">
        <div class="text-end mb-3">
            <a class="common_btn" href="#" data-bs-toggle="modal" data-bs-target="#createLoanTypeModal">Create Loan Type</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Interest (%)</th>
                    <th>Terms</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($loanTypes as $loanType)
                <tr>
                    <td>{{ $loanType->type_name }}</td>
                    <td>{{ $loanType->interest }}</td>
                    <td>{{ $loanType->loan_terms }} {{ $loanType->day_month_type }}/s</td>
                    <td>
                        <a href="#" class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#editLoanTypeModal{{ $loanType->id }}">
                            <span class="material-symbols-outlined">edit</span>
                        </a>
                        <form action="{{ route('admin.loan-types.destroy', $loanType->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete();">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link p-0"><span class="material-symbols-outlined">delete</span></button>
                        </form>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editLoanTypeModal{{ $loanType->id }}" tabindex="-1" aria-labelledby="editLoanTypeModalLabel{{ $loanType->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editLoanTypeModalLabel{{ $loanType->id }}">Edit Loan Type</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.loan-types.update', $loanType->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row gy-3">
                                        <div class="col-6">
                                            <label>Name</label>
                                            <input type="text" name="type_name" class="form-control" value="{{ $loanType->type_name }}" placeholder="Enter name" required>
                                        </div>
                                        <div class="col-6">
                                            <label>Interest</label>
                                            <input type="number" name="interest" class="form-control" value="{{ $loanType->interest }}" required>
                                        </div>
                                        <div class="col-6">
                                            <label>Loan Terms</label>
                                            <input type="number" name="loan_terms" class="form-control" value="{{ $loanType->loan_terms }}" required>
                                        </div>
                                        <div class="col-6">
                                            <label>Select</label>
                                            <select class="form-select" name="day_month_type" required>
                                                <option value="Day" {{ $loanType->day_month_type == 'Day' ? 'selected' : '' }}>Day/s</option>
                                                <option value="Month" {{ $loanType->day_month_type == 'Month' ? 'selected' : '' }}>Month/s</option>
                                            </select>
                                        </div>
                                        <div class="col-12 text-end">
                                            <input type="submit" value="Update" class="btn btn-primary">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Create Modal -->
<div class="modal fade" id="createLoanTypeModal" tabindex="-1" aria-labelledby="createLoanTypeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createLoanTypeModalLabel">Create Loan Type</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.loan-types.store') }}" method="POST">
                    @csrf
                    <div class="row gy-3">
                        <div class="col-6">
                            <label>Name</label>
                            <input type="text" name="type_name" class="form-control" placeholder="Enter name" required>
                        </div>
                        <div class="col-6">
                            <label>Interest</label>
                            <input type="number" name="interest" class="form-control" required>
                        </div>
                        <div class="col-6">
                            <label>Loan Terms</label>
                            <input type="number" name="loan_terms" class="form-control" required>
                        </div>
                        <div class="col-6">
                            <label>Select</label>
                            <select class="form-select" name="day_month_type" required>
                                <option value="Day">Day/s</option>
                                <option value="Month">Month/s</option>
                            </select>
                        </div>
                        <div class="col-12 text-end">
                            <input type="submit" value="Create" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete() {
    return confirm('Are you sure you want to delete this loan type? This action cannot be undone.');
}
</script>

@endsection
