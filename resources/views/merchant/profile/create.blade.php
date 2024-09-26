@extends('layouts.sb-admin')

@section('content')
<div class="container">
    <h1>Buat Profil Merchant</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('merchant.profile.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="company_name" class="form-label">Nama Perusahaan</label>
            <input type="text" class="form-control" id="company_name" name="company_name" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>

        <div class="mb-3">
            <label for="contact" class="form-label">Kontak</label>
            <input type="text" class="form-control" id="contact" name="contact" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Buat Profil</button>
    </form>
</div>
@endsection
