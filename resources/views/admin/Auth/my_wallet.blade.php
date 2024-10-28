@extends('admin.layouts.main')

@section('content')
<div class="right_part">
    <h3 class="pageTitlw">Wallet Management </h3>

    <div class="money_table">
       <div class="text-end mb-3">
        <a class="common_btn" id="addMoneyButton" data-bs-toggle="modal" data-bs-target="#walletModal">Add Money</a>
      </div>
        <table class="table" id="zero_config">
          <thead>
            <tr>
              <th>Serial No.</th>
              <th>Name</th>
              <th>Amount</th>
              <th>Description</th>
              <th>Transaction Type</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($wallets as $index => $wallet)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ $wallet->name }}</td>
              <td>{{ $wallet->amount }}</td>
              <td>{{ $wallet->description }}</td>
              <td>{{ $wallet->transaction_type }}</td>
              <td>{{ $wallet->created_at->format('d/m/Y') }}</td>
              <td>
                <ul class="actn">
                  <li><a href="javascript:void(0);" onclick="editWallet({{ $wallet->id }}, '{{ $wallet->name }}', '{{ $wallet->amount }}', '{{ $wallet->description }}', '{{ $wallet->transaction_type }}')">
                    <span class="material-symbols-outlined">edit</span></a></li>
                  <li><a href="javascript:void(0);" onclick="deleteWallet({{ $wallet->id }})">
                    <span class="material-symbols-outlined">delete</span></a></li>
                </ul>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div> 

    <!-- Modal for Adding/Editing Wallet -->
    <div class="modal fade" id="walletModal" tabindex="-1" aria-labelledby="walletModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="walletModalLabel">Add Money</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="walletForm">
                        @csrf
                        <input type="hidden" id="wallet_id">
                        <div class="row gy-3">
                            <div class="col-12">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" required>
                            </div>
                            <div class="col-12">
                                <label>Amount</label>
                                <input type="text" name="amount" class="form-control" id="amount" placeholder="Enter amount" required>
                            </div>
                            <div class="col-12">
                                <label>Description</label>
                                <textarea name="description" class="form-control" id="description"></textarea>
                            </div>
                            <div class="col-6">
                                <label>Transaction Type</label>
                                <select name="transaction_type" class="form-select" id="transaction_type" required>
                                    <option value="Cash">Cash</option>
                                    <!-- Add other options as needed -->
                                </select>
                            </div>
                            <div class="col-12 text-end">
                                <button type="button" onclick="saveWallet()" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Open modal for adding a new wallet
    document.getElementById('addMoneyButton').addEventListener('click', function () {
        document.getElementById('walletForm').reset();
        document.getElementById('wallet_id').value = '';
        document.getElementById('walletModalLabel').textContent = 'Add Money';
    });

    // Open modal for editing a wallet
    function editWallet(id, name, amount, description, transactionType) {
        document.getElementById('wallet_id').value = id;
        document.getElementById('name').value = name;
        document.getElementById('amount').value = amount;
        document.getElementById('description').value = description;
        document.getElementById('transaction_type').value = transactionType;
        document.getElementById('walletModalLabel').textContent = 'Edit Money';
        new bootstrap.Modal(document.getElementById('walletModal')).show();
    }

    // Save (Create or Update) wallet
    function saveWallet() {
    let walletId = document.getElementById('wallet_id').value;
    let url = walletId 
        ? `{{ route('admin.wallets.update', '') }}/${walletId}`  // This will correctly include the wallet ID for update
        : "{{ route('admin.wallets.store') }}"; // Use the store route for creating

    let method = walletId ? 'PUT' : 'POST'; // Use PUT for updates

    fetch(url, {
        method: method,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            name: document.getElementById('name').value,
            amount: document.getElementById('amount').value,
            description: document.getElementById('description').value,
            transaction_type: document.getElementById('transaction_type').value
        })
    })
    .then(response => response.json())
    .then(data => {
        alert(data.success);
        location.reload();
    })
    .catch(error => console.error('Error:', error));
}
function deleteWallet(id) {
    if (confirm('Are you sure you want to delete this entry?')) {
        fetch(`{{ route('admin.wallets.destroy', '') }}/${id}`, { // Use the route helper here
            method: 'GET', // Change this to GET
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            alert(data.success);
            location.reload();
        })
        .catch(error => {
            console.error('Error:', error);
            alert('There was an error deleting the wallet.');
        });
    }
}




</script>
@endsection
