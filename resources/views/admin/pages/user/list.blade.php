@extends('admin.layouts.main')

@section('content')

<div class="right_part">
    <h3 class="pageTitlw">Users Management</h3>

    <div class="money_table">
       <div class="mb-3 text-end">
        <a class="common_btn" href="{{ URL::to('admin/user_add') }}">Add User</a>
      </div>
        <table class="table" id="zero_config">
          <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>User Group</th>
                <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user) <!-- Loop through users -->
            <tr>
                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->user_type }}</td>
                <td>
                    <ul class="actn">
                        <li>
                            <a href="{{ route('admin.users.edit', $user->id) }}"> <!-- Assuming you have a route for editing -->
                                <span class="material-symbols-outlined">edit</span>
                            </a>
                        </li>
                        <li>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;"  onsubmit="return confirmDelete();"> <!-- Assuming you have a route for deleting -->
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link p-0"><span class="material-symbols-outlined">delete</span></button>
                            </form>
                        </li>
                    </ul>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
</div>

<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this loan type? This action cannot be undone.');
    }
    </script>

@endsection
