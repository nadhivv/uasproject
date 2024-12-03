@extends('admin.layout.main')

@section('content')
<div class="container">
    <h1>Daftar Makanan</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Makanan</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($makanan as $item)
                <tr>
                    <td>{{ $item->nama_makanan }}</td>
                    <td>Rp {{ number_format($item->harga, 2) }}</td>
                    <td>
                        <form action="{{ route('order.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                            <input type="hidden" name="penginapan_id" value="">  <!-- ini nanti diganti dengan penginapan id yang sesuai -->
                            <input type="hidden" name="price" value="{{ $item->harga }}">
                            <button type="submit" class="btn btn-primary">Pesan Makanan</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
