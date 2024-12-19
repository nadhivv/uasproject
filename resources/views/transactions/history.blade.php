@extends('admin.layout.main')

@section('content')
<div class="container">
    <h2 class="mb-4">Transaction History</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>Service</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaction as $tran) <!-- Menggunakan $tran di sini -->
                    <tr>
                        <td>{{ $tran->order_id }}</td>
                        <td>{{ \Carbon\Carbon::parse($tran->created_at)->translatedFormat('d F Y H:i') }}</td>
                        <td>
                            @foreach($tran->items as $item)
                                <div>{{ $item->makanan->nama_makanan }} ({{ $item->quantity }}x)</div>
                            @endforeach
                        </td>
                        <td>Rp {{ number_format($tran->total_amount) }}</td>
                        <td>
                            <span class="badge bg-{{ $tran->status === 'paid' ? 'success' : ($tran->status === 'success' ? 'warning' : 'danger') }}">
                                {{ ucfirst($tran->status) }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
