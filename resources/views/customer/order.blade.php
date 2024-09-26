{{-- resources/views/customer/order.blade.php --}}
@extends('layouts.sb-admin')

@section('content')
<div class="container">
    <h2>Pemesanan Menu: {{ $menu->name }}</h2>
    <img src="{{ asset('storage/' . $menu->image_path) }}" alt="{{ $menu->name }}" style="width: 300px; height: auto;">
    <p>Deskripsi: {{ $menu->description }}</p>
    <p>Harga: Rp {{ number_format($menu->price, 0, ',', '.') }}</p>

    <form action="{{ route('customer.order', $menu->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="quantity">Jumlah:</label>
            <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
        </div>
        <div class="form-group">
            <label for="delivery_date">Tanggal Pengiriman:</label>
            <input type="date" name="delivery_date" id="delivery_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
    </form>
</div>
@endsection
