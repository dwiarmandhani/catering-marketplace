<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di My Catering Kami</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }
        .menu-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            transition: box-shadow 0.3s;
        }
        .menu-item img {
            max-width: 100%;
            border-radius: 8px;
            height: auto;
        }
        .menu-item:hover {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Selamat Datang di My Catering Kami</h1>

        <div class="row mt-4">
            <div class="col-md-12">
                <h2>Daftar Menu</h2>
                <div class="menu-grid">
                    @foreach ($menus as $menu)
                        <div class="menu-item">
                            <img src="{{ asset('storage/' . $menu->image_path) }}" alt="{{ $menu->name }}">
                            <h5>{{ $menu->name }}</h5>
                            <p>{{ $menu->description }}</p>
                            <span class="badge bg-primary">Rp {{ number_format($menu->price, 0, ',', '.') }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            @if(Auth::guest())
                <p class="text-muted">Anda perlu login untuk melakukan pemesanan.</p>
                <a href="{{ route('login') }}" class="btn btn-primary">Login untuk Pemesanan</a>
            @else
                <a href="{{ route('customer.search') }}" class="btn btn-success">Lanjutkan Pemesanan Lewat Dashboard</a>
            @endif
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
