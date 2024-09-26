@if($menus->count() > 0)
    @foreach($menus as $menu)
        <div class="menu-item">
            <img src="{{ asset('storage/' . $menu->image_path) }}" alt="{{ $menu->name }}">
            <h3>{{ $menu->name }}</h3>
            <p>{{ $menu->description }}</p>
            <p>Harga: Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
            @php
                $merchant = \App\Models\Merchant::find($menu->merchant_id);
            @endphp
            @if($merchant && $merchant->user_id !== auth()->user()->id)
                <a class="btn btn-primary" href="{{ route('customer.order', $menu->id) }}">Pesan Sekarang</a>
            @else
                <p class="text-muted">Anda adalah pemilik paket ini.</p>
            @endif
        </div>
    @endforeach
    {{ $menus->links() }}
@else
    <p>Tidak ada katering yang ditemukan.</p>
@endif
