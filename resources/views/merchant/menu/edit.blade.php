<!-- resources/views/merchant/menu/edit.blade.php -->
@extends('layouts.sb-admin')

@section('content')
<div class="container">
    <h2>Edit Menu Makanan</h2>

    <form action="{{ route('merchant.menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Menu</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $menu->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="description">{{ old('description', $menu->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="number" class="form-control" name="price" value="{{ old('price', $menu->price) }}" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar (Kosongkan jika tidak ingin mengubah)</label>
            <input type="file" class="form-control" name="image" accept="image/*">
            @if($menu->image_path)
                <img src="{{ asset('storage/' . $menu->image_path) }}" alt="{{ $menu->name }}" width="100" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection
