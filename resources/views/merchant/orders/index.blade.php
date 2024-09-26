
@extends('layouts.sb-admin')

@section('content')
<style>
    .status-pending {
    background-color: yellow; /* Warna untuk Pending */
}

.status-sudah-bayar {
    background-color: lightgreen; /* Warna untuk Sudah Bayar */
}

.status-dikirim {
    background-color: lightblue; /* Warna untuk Dikirim */
}

.status-selesai {
    background-color: lightgray; /* Warna untuk Selesai */
}

</style>
<div class="container">
    <h1>Daftar Pesanan</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Invoice</th>
                <th>Menu</th>
                <th>Jumlah</th>
                <th>Tanggal Pengiriman</th>
                <th>Total Harga</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>
                        <a href="{{ asset('storage/invoices/' . $order->invoice.'.pdf') }}" target="_blank" class="btn btn-primary">{{ $order->invoice }}</a>
                    </td>
                    <td>{{ $order->menu->name }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->delivery_date }}</td>
                    <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('merchant.orders.update', $order->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="form-control status-select" onchange="this.form.submit()" id="status-{{ $order->id }}">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="sudah bayar" {{ $order->status == 'sudah bayar' ? 'selected' : '' }}>Sudah Bayar</option>
                                <option value="dikirim" {{ $order->status == 'dikirim' ? 'selected' : '' }}>Dikirim</option>
                                <option value="selesai" {{ $order->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada pesanan yang ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.status-select').forEach(function (select) {
        // Set the initial background color
        updateStatusColor(select);

        // Listen for changes
        select.addEventListener('change', function () {
            updateStatusColor(select);
        });
    });
});

// Function to update the background color based on selected status
function updateStatusColor(select) {
    switch (select.value) {
        case 'pending':
            select.className = 'form-control status-select status-pending';
            break;
        case 'sudah bayar':
            select.className = 'form-control status-select status-sudah-bayar';
            break;
        case 'dikirim':
            select.className = 'form-control status-select status-dikirim';
            break;
        case 'selesai':
            select.className = 'form-control status-select status-selesai';
            break;
        default:
            select.className = 'form-control status-select';
    }
}

</script>
@endsection
