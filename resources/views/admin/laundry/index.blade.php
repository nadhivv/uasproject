@extends('admin.layout.main')

@section('content')
<div class="container">
    <h1>Daftar Layanan Laundry</h1>

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
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laundry as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->jenis_laundry }}</td>
                    <td>Rp {{ number_format($item->harga, 2) }}</td>
                    <td>
                        <form action="{{ route('laundry.store', $reservasiId) }}" method="POST">
                            @csrf
                            <input type="hidden" name="laundry_id" value="{{ $item->id }}">
                            <input type="hidden" name="penginapan_id" value="{{ $reservasi->penginapan_id }}"> 
                            <button type="submit" class="btn btn-primary">Pesan Laundry</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
