<!-- resources/views/merchant/menu/create.blade.php -->
@extends('layouts.sb-admin')

@section('content')
<div class="container">
    <h2>Tambah Menu Makanan</h2>

    <form action="{{ route('merchant.menu.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Menu</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="description"></textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="number" class="form-control" name="price" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar</label>
            <input type="file" class="form-control" name="image" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
