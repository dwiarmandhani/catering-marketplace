@extends('layouts.sb-admin')

@section('content')
<div class="container mt-4">
    <h2>Cari Katering</h2>
    <form id="search-form" action="{{ route('customer.search') }}" method="GET">
        @csrf
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="name" class="form-label">Nama Menu:</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan Nama Menu">
            </div>
            <div class="col-md-4">
                <label for="min_price" class="form-label">Harga Minimum:</label>
                <input type="number" name="min_price" id="min_price" class="form-control" placeholder="Harga Minimum">
            </div>
            <div class="col-md-4">
                <label for="max_price" class="form-label">Harga Maksimum:</label>
                <input type="number" name="max_price" id="max_price" class="form-control" placeholder="Harga Maksimum">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Cari Katering</button>
    </form>
</div>

<div id="menu-list" class="grid-container mt-4">
    @include('customer.partials.menu_list', ['menus' => $menus])
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#search-form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                method: 'GET',
                data: $(this).serialize(),
                beforeSend: function() {
                    $('#menu-list').html('<p>Loading...</p>'); // Menampilkan loading
                },
                success: function(data) {
                    $('#menu-list').html(data);
                },
                error: function() {
                    $('#menu-list').html('<p>Terjadi kesalahan dalam pencarian.</p>');
                }
            });
        });
    });
</script>

<style>
    .grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 10px;
    }
    .menu-item {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: center;
        border-radius: 5px; /* Rounded corners */
        transition: box-shadow 0.3s; /* Smooth shadow transition */
    }
    .menu-item:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Shadow on hover */
    }
    .menu-item img {
        width: 100%;
        height: auto;
        border-radius: 5px; /* Rounded corners for images */
    }
</style>
@endsection
