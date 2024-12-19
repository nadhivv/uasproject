@extends('admin.layout.main')

@section('content')

    <div class="row mb-4">
        <div class="col">
            <h3 class="font-weight-bold">List User</h3>
            <h6 class="font-weight-normal mb-0">
                All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span>
            </h6>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="card-title mb-4">User List</h4>
            <div class="table-responsive">
                <table  id="myTable" class="table table-hover table-striped w-100">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nama User</th>
                            <th>Email</th>
                            <th>Jenis User</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->jenisusers->jenis_user }}</td>
                                <td>
                                    <a href="{{ route('edit.users', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('delete.users', $user->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No users found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<br>
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h4 class="card-title mb-4">Add New User</h4>
            <form action="{{ route('store.users') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nama User</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter user name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                </div>
                <div class="form-group">
                    <label for="jenisuser_id">Jenis User</label>
                    <select class="form-control" id="jenisuser_id" name="jenisuser_id" required>
                        <option value="" disabled selected>Pilih Jenis User</option>
                        @foreach($jenisusers as $jenis)
                            <option value="{{ $jenis->id }}">{{ $jenis->jenis_user }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add User</button>
            </form>
        </div>
    </div>




@endsection
