@extends('admin.layout.main')

@section('content')
<div class="container">
    <h1>Daftar Makanan</h1>
    <a href="{{ route('admin.makanan.create') }}" class="btn btn-primary mb-3">Tambah Makanan</a>
    <a href="{{ route('transactions.index') }}" class="btn btn-primary mb-3"> History Pesanan</a>
    <table  id="myTable" class="table">
        <thead>
            <tr>
                <th>Photo</th>
                <th>Nama Makanan</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($makanan as $item)
                <tr>
                    <td><img src="{{ asset('storage/images/' . $item->photo) }}" style="width: 70px; height: 50px;"></td>
                    <td>{{ $item->nama_makanan }}</td>
                    <td>Rp {{ number_format($item->harga, 2) }}</td>
                    <td>
                        <a href="{{ route('admin.makanan.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.makanan.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus makanan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
