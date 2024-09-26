<!-- resources/views/merchant/menu/index.blade.php -->
@extends('layouts.sb-admin')

@section('content')
<div class="container">
    <h2>Menu Makanan</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('merchant.menu.create') }}" class="btn btn-primary mb-3">Tambah Menu</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
                <tr>
                    <td>{{ $menu->name }}</td>
                    <td>{{ $menu->description }}</td>
                    <td>{{ $menu->price }}</td>
                    <td>
                        @if($menu->image_path)
                            <img src="{{ asset('storage/' . $menu->image_path) }}" alt="{{ $menu->name }}" width="100">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('merchant.menu.edit', $menu->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('merchant.menu.delete', $menu->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus menu ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
