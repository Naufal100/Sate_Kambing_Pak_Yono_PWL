<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu; 

class HomeController extends Controller
{
    public function index()
    {
        // 1. Ambil data menu dari database
        $menus = Menu::all();

        // 2. Kirim data menu ke view (agar variabel $menus dikenali di blade)
        return view('pelanggan.home', compact('menus'));
    }
}
