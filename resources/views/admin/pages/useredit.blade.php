@extends('admin.layout.main')

@section('content')

<div class="row mb-5">
    <div class="col">
        <h3 class="font-weight-bold">List User</h3>
        <h6 class="font-weight-normal mb-0">
            All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span>
        </h6>
    </div>
</div>

    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="card-title mb-4">Update User Information</h4>
            <form id="updateUserForm" method="POST" action="{{ route('update.users', $users->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name" class="form-label">Nama User</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $users->name) }}" required>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $users->email) }}" required>
                </div>

                <div class="form-group">
                    <label for="jenisuser_id" class="form-label">Jenis User</label>
                    <select class="form-control" id="jenisuser_id" name="jenisuser_id" required>
                        @foreach ($jenisusers as $jenis)
                            <option value="{{ $jenis->id }}" {{ $users->jenisuser_id == $jenis->id ? 'selected' : '' }}>
                                {{ $jenis->jenis_user }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <small class="form-text text-muted">Leave blank if you don't want to change the password.</small>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success">Update User</button>
                </div>
            </form>

            <div class="mt-3">
                <a href="/admin/user" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
    <br>
    <div id="message"></div>



@endsection
