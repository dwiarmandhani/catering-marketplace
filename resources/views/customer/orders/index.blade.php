@extends('layouts.sb-admin')

@section('content')
<h2>Daftar Pesanan</h2>

@if($orders->count() > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Invoice</th>
                <th>Menu</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Tanggal Pengiriman</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>
                        <a href="{{ asset('storage/invoices/' . $order->invoice.'.pdf') }}" target="_blank" class="btn btn-primary">{{ $order->invoice }}</a>
                    </td>
                    <td>{{ $order->menu->name }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                    <td>{{ $order->delivery_date }}</td>
                    <td>{{ ucfirst($order->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Tidak ada pesanan yang ditemukan.</p>
@endif
@endsection
