@extends('admin.layout.main')

@section('content')
<div class="container">
    <h1>Edit Makanan</h1>
    <form action="{{ route('admin.makanan.update', $makanan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_makanan" class="form-label">Nama Makanan</label>
            <input type="text" name="nama_makanan" id="nama_makanan" class="form-control" value="{{ old('nama_makanan', $makanan->nama_makanan) }}" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" name="harga" id="harga" class="form-control" value="{{ old('harga', $makanan->harga) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

