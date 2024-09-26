<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchant;
use Illuminate\Support\Facades\Auth;

class MerchantProfileController extends Controller
{
    public function index()
    {

        // Mengambil data Merchant berdasarkan user yang sedang login

        $merchant = Merchant::where('user_id', Auth::id())->first();

        return view('merchant.profile.index', compact('merchant'));
    }
    public function create()
    {
        return view('merchant.profile.create'); // Menampilkan form untuk membuat profil Merchant
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);


        Merchant::create([
            'user_id' => Auth::id(),
            'company_name' => $request->company_name,
            'address' => $request->address,
            'contact' => $request->contact,
            'description' => $request->description,
        ]);

        return redirect()->route('merchant.profile.index')->with('success', 'Profil Merchant berhasil dibuat.');
    }
    public function edit()
    {

        $merchant = Auth::user()->merchant;
        return view('merchant.profile.edit', compact('merchant'));
    }

    public function update(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'company_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        // Mengupdate profil Merchant
        $merchant = Auth::user()->merchant;
        $merchant->update($request->all());

        return redirect()->route('merchant.profile.edit')->with('success', 'Profil berhasil diperbarui.');
    }
}

