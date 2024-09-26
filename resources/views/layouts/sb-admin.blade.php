<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Marketplace Katering')</title>
    <link href="{{ asset('sb-admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body >
    <div id="app">
        @include('layouts.sb-admin-header') <!-- Header navigasi -->
        <div class="container-fluid">
            <div class="row">
                @include('layouts.sb-admin-sidebar') <!-- Sidebar -->

                <div class="col-md-9 ms-sm-auto col-lg-10 px-4">
                    <div class="mt-4">
                        @yield('content') <!-- Konten spesifik halaman -->
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.sb-admin-footer') <!-- Footer -->
    </div>

    <script src="{{ asset('sb-admin/js/sb-admin.min-2.js') }}"></script>
    @yield('scripts') <!-- Untuk menambahkan script tambahan -->
</body>
</html>
