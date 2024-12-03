@extends('admin.layout.main')

@section('content')
<div class="container">
    <h1>Riwayat Pesanan</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Pesanan Makanan -->
    <h2>Pesanan Makanan</h2>
    @if($foodOrders->isEmpty())
        <p>Tidak ada pesanan makanan yang ditemukan.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Penginapan</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Tanggal Pemesanan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($foodOrders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $order->penginapan->name ?? 'N/A' }}</td>
                        <td>{{ $order->description ?? '-' }}</td>
                        <td>Rp {{ number_format($order->price, 2) }}</td>
                        <td>
                            @if($order->status === 'processing')
                                <span class="badge bg-warning text-dark">Sedang Diproses</span>
                            @elseif($order->status === 'completed')
                                <span class="badge bg-success">Selesai</span>
                            @endif
                        </td>
                        <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <!-- Pesanan Laundry -->
    <h2>Pesanan Laundry</h2>
    @if($laundryOrders->isEmpty())
        <p>Tidak ada pesanan laundry yang ditemukan.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Penginapan</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Tanggal Pemesanan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($laundryOrders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $order->penginapan->name ?? 'N/A' }}</td>
                        <td>{{ $order->description ?? '-' }}</td>
                        <td>Rp {{ number_format($order->price, 2) }}</td>
                        <td>
                            @if($order->status === 'processing')
                                <span class="badge bg-warning text-dark">Sedang Diproses</span>
                            @elseif($order->status === 'completed')
                                <span class="badge bg-success">Selesai</span>
                            @endif
                        </td>
                        <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
