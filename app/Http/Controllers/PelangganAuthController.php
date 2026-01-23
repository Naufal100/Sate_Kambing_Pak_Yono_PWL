<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganAuthController extends Controller
{
    // Form Register
    public function viewRegister()
    {
        return view('pelanggan.register');
    }

    // Proses Register
    public function prosesRegister(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:50',
            'email' => 'required|email|unique:pelanggan,email_pelanggan',
            'no_hp' => 'required|string|max:15',
            'password' => 'required|string|min:4'
        ]);

        Pelanggan::create([
            'username' => $request->username,
            'email_pelanggan' => $request->email,
            'no_tlp' => $request->no_hp,
            'password' => $request->password, 
        ]);

        return redirect('/login-pelanggan')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // Form Login
    public function viewLogin()
    {
        return view('pelanggan.login');
    }

    // Proses Login
    public function prosesLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Cek user berdasarkan username & password
        $pelanggan = Pelanggan::where('username', $request->username)
                            ->where('password', $request->password)
                            ->first();

        if (!$pelanggan) {
            return back()->with('error', 'Username atau password salah');
        }

        // Set Session Pelanggan
        session([
            'loginpelanggan' => true,
            'pelanggan_id' => $pelanggan->id_user,
            'pelanggan_username' => $pelanggan->username
        ]);

        return redirect('/');
    }

    // Logout
    public function logout()
    {
        session()->forget(['loginpelanggan', 'pelanggan_id', 'pelanggan_username']);
        return redirect('/');
    }
}
