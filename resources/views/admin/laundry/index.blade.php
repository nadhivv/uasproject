@extends('admin.layout.main')

@section('content')
<div class="container">
    <h1><b>Daftar Pesanan Laundry</b></h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Jenis Laundry</th>
                <th>Harga</th>
                <th>Jumlah (Kg)</th>
                <th>Waktu Pengambilan</th>
                <th>Waktu Pengembalian</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($laundry as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->jenis_laundry }}</td>
                    <td>Rp {{ number_format($item->harga, 2, ',', '.') }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->waktu_pengambilan }}</td>
                    <td>{{ $item->waktu_pengembalian }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <form action="" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Data tidak ditemukan</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
