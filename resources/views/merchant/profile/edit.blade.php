@extends('layouts.sb-admin')

@section('content')
<div class="container">
    <h1>Edit Profil Merchant</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('merchant.profile.update') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="company_name" class="form-label">Nama Perusahaan</label>
            <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name', $merchant->company_name) }}" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $merchant->address) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $merchant->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui Profil</button>
    </form>
</div>
@endsection
