<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class CustomerController extends Controller
{
    public function search(Request $request)
    {
        $query = Menu::query();

        // Filter berdasarkan nama menu
        if ($request->filled('name')) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }

        // Filter berdasarkan harga
        if ($request->filled('min_price') && $request->filled('max_price')) {
            $query->whereBetween('price', [$request->min_price, $request->max_price]);
        }

        $menus = $query->paginate(10);

        // Jika request AJAX, kembalikan partial view
        if ($request->ajax()) {
            return view('customer.partials.menu_list', compact('menus'));
        }

        return view('customer.search', compact('menus'));
    }

    public function showOrderForm($menuId)
    {
        $menu = Menu::findOrFail($menuId);
        return view('customer.order', compact('menu'));
    }


    public function order(Request $request, $menuId)
    {
        $menu = Menu::findOrFail($menuId);

        $request->validate([
            'quantity' => 'required|integer|min:1',
            'delivery_date' => 'required|date|after_or_equal:today',
        ]);

        // Simpan pesanan
        $order = new Order();
        $order->customer_id = Auth::id();
        $order->menu_id = $menu->id;
        $order->quantity = $request->quantity;
        $order->total_price = $menu->price * $request->quantity;
        $order->delivery_date = $request->delivery_date;
        $order->status = 'pending';
        $order->invoice = 'INV-' . strtoupper(uniqid());
        $order->save();
        $pdf = Pdf::loadView('invoice', compact('order'));
        $pdfPath = public_path('storage/invoices/' . $order->invoice . '.pdf');
        $pdf->save($pdfPath);

        return redirect()->route('customer.orders.index')->with('success', 'Pesanan berhasil dibuat.');
    }
    public function orders()
    {
        $orders = Order::where('customer_id', Auth::id())->with('menu')->get(); // Ambil semua pesanan untuk pengguna yang sedang login
        return view('customer.orders.index', compact('orders')); // Kembali ke view dengan data pesanan
    }

}
