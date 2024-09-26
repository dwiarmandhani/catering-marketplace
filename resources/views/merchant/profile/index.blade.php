@extends('layouts.sb-admin')

@section('content')
<div class="container">
    <h1>Profil Perusahaan</h1>

    @if($merchant)
        <div class="card mb-4">
            <div class="card-header">
                <h5>{{ $merchant->company_name }}</h5>
            </div>
            <div class="card-body">
                <p><strong>Alamat:</strong> {{ $merchant->address }}</p>
                <p><strong>Kontak:</strong> {{ $merchant->contact }}</p>
                <p><strong>Deskripsi:</strong> {{ $merchant->description }}</p>

                <a href="{{ route('merchant.profile.create') }}" class="btn btn-secondary">Edit Profil</a>
            </div>
        </div>
    @else
        <p>Profil perusahaan belum dibuat. <a href="{{ route('merchant.profile.create') }}">Buat Profil Sekarang</a></p>
    @endif
</div>
@endsection
