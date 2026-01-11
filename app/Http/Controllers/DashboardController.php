<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;

class DashboardController extends Controller
{
    public function index()
    {
        if (!session()->has('loginadmin')) {
            return redirect('/login');
        }

        $totalPesanan = Pesan::count();

        return view('admin.dashboard', compact('totalPesanan'));
    }

    public function kelolaMenu()
    {
        if (!session()->has('loginadmin')) {
            return redirect('/login');
        }

        return view('admin.menu');
    }

    public function kelolaPesanan()
    {
        if (!session()->has('loginadmin')) {
            return redirect('/login');
        }

        return redirect()->route('pesan.index');
    }

    public function kelolaSaran()
    {
        if (!session()->has('loginadmin')) {
            return redirect('/login');
        }

        return view('admin.saran');
    }

    public function profil()
    {
        if (!session()->has('loginadmin')) {
            return redirect('/login');
        }

        return view('admin.profil');
    }
}
