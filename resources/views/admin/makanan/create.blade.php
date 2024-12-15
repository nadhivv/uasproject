@extends('admin.layout.main')

@section('content')
<div class="container">
    <h1>Tambah Makanan</h1>
    <form action="{{ route('admin.makanan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama_makanan" class="form-label">Nama Makanan</label>
            <input type="text" name="nama_makanan" id="nama_makanan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" id="harga" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="photo">Foto Makanan</label>
            <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
