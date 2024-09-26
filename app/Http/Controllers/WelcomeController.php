<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $menus = Menu::all(); // Ambil semua menu dari database
        return view('welcome', compact('menus')); // Kirim data menu ke view
    }
}
