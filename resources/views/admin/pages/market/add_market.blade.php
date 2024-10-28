@extends('admin.layouts.main')

@section('content')
<div class="right_part">
    <h3 class="pageTitle">Market</h3>

    <div class="money_table">
        <div class="text-end mb-3">
            <a class="common_btn" href="#" data-bs-toggle="modal" data-bs-target="#createMarketModal">Add Market</a>
        </div>
        
        <table class="table" id="zero_config">
            <thead>
                <tr>
                    <th>Serial No.</th>
                    <th>Market Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($markets as $index => $market)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $market->market_name }}</td>
                        <td>
                            <ul class="actn">
                                <!-- Trigger for Edit Modal -->
                                <li><a href="#" data-bs-toggle="modal" data-bs-target="#editMarketModal{{ $market->id }}"><span class="material-symbols-outlined">edit</span></a></li>
                                <!-- Delete Form -->
                                <li>
                                  <form action="{{ route('admin.markets.destroy', $market->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-link p-0"><span class="material-symbols-outlined">delete</span></button>
                                  </form>
                              </li>
                            </ul>
                        </td>
                    </tr>

                    <!-- Edit Market Modal -->
                    <div class="modal fade" id="editMarketModal{{ $market->id }}" tabindex="-1" aria-labelledby="editMarketLabel{{ $market->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editMarketLabel{{ $market->id }}">Edit Market</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin.markets.update', $market->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="marketName" class="form-label">Market Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ $market->market_name }}" required>
                                        </div>
                                        <div class="text-end"> 
                                            <button type="submit" class="btn btn-primary">Update</button>
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

<!-- Modal for creating a new market -->
<div class="modal fade" id="createMarketModal" tabindex="-1" aria-labelledby="marketLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="marketLabel">Create Market</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.markets.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="marketName" class="form-label">Market Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter market name" required>
                    </div>
                    <div class="text-end"> 
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
  function confirmDelete() {
      return confirm('Are you sure you want to delete this market? This action cannot be undone.');
  }
  </script>

@endsection
