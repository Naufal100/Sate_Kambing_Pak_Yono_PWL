<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (!session()->has('loginadmin')) {
            return redirect('/login');
        }

        return view('admin.dashboard');
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

        return view('admin.pesanan');
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
