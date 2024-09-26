<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:merchant']);
    }

    public function index()
    {

        $merchant = Auth::user()->merchant;
        // Mengambil menu untuk merchant yang sedang login
        $menus = Menu::where('merchant_id', $merchant->id)->get();
        return view('merchant.menu.index', compact('menus'));
    }

    public function create()
    {
        return view('merchant.menu.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $merchant = Auth::user()->merchant;

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('menus', 'public');
        }

        Menu::create([
            'merchant_id' => $merchant->id, // Mendapatkan ID user merchant yang sedang login
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image_path' => $imagePath, // Menyimpan path gambar jika ada
        ]);

        return redirect()->route('merchant.menu.index')->with('success', 'Menu berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('merchant.menu.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $menu = Menu::findOrFail($id);

        $menu->name = $request->name;
        $menu->description = $request->description;
        $menu->price = $request->price;

        if ($request->hasFile('image')) {
            if ($menu->image_path) {
                Storage::disk('public')->delete($menu->image_path);
            }

            $path = $request->file('image')->store('menus', 'public');
            $menu->image_path = $path;
        }

        $menu->save();

        return redirect()->route('merchant.menu.index')->with('success', 'Menu berhasil diperbarui.');
    }


    public function destroy(Menu $menu)
    {
        // Pastikan hanya merchant yang memiliki menu yang bisa menghapus
        if ($menu->merchant_id !== Auth::user()->merchant->id) {
            return redirect()->route('merchant.menu.index')->withErrors('Anda tidak berhak menghapus menu ini.');
        }

        // Hapus menu
        $menu->delete();

        return redirect()->route('merchant.menu.index')->with('success', 'Menu berhasil dihapus.');
    }

    public function orderList()
    {

        $orders = Order::with('menu')
            ->whereHas('menu', function($query) {
                $query->where('merchant_id', Auth::user()->merchant->id);
            })
            ->get();

        return view('merchant.orders.index', compact('orders'));
    }

    public function showInvoice(Order $order)
    {
        if ($order->menu->merchant_id !== Auth::user()->merchant->id) {
            abort(403, 'Unauthorized access to this invoice.');
        }
        return response()->file(public_path('invoices/' . $order->invoice));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        // Validasi status yang diterima
        $request->validate([
            'status' => 'required|string|in:pending,sudah bayar,dikirim,selesai',
        ]);

        // Update status pesanan
        $order->status = $request->status;
        $order->save();

        return redirect()->route('merchant.orders.index')->with('success', 'Status pesanan berhasil diperbarui.');
    }


}
