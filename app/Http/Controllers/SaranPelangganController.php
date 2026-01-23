<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Models\Saran;
use App\Models\Pelanggan; 

class SaranPelangganController extends Controller
{
    public function index()
    {
        if (!session('loginpelanggan')) {
            return redirect('/login-pelanggan')->with('error', 'Silakan login dulu.');
        }

        // Ambil ID dari session
        $id_user = session('pelanggan_id');

        // Fallback: Jika session id kosong tapi email ada (jaga-jaga)
        if(!$id_user && session('pelanggan_email')) {
             $pelanggan = Pelanggan::where('email_pelanggan', session('pelanggan_email'))->first();
             $id_user = $pelanggan ? $pelanggan->id_user : null;
        }

        // Ambil saran milik user ini saja
        $sarans = Saran::where('id_user', $id_user)->latest()->get();

        // Mengarah ke view: resources/views/pelanggan/saran/index.blade.php
        return view('pelanggan.saran', compact('sarans'));
    }

    public function store(Request $request)
    {
        $request->validate(['isi' => 'required']);

        // Pastikan ID user terisi
        $id_user = session('pelanggan_id');
        if(!$id_user && session('pelanggan_email')) {
             $pelanggan = Pelanggan::where('email_pelanggan', session('pelanggan_email'))->first();
             $id_user = $pelanggan->id_user;
        }

        Saran::create([
            'id_user' => $id_user,
            'isi' => $request->isi
        ]);

        return back()->with('success', 'Saran berhasil dikirim!');
    }

    public function update(Request $request, $id)
    {
        $request->validate(['isi' => 'required']);
        $saran = Saran::findOrFail($id);
        $saran->update(['isi' => $request->isi]);

        return back()->with('success', 'Saran diperbarui.');
    }

    public function destroy($id)
    {
        $saran = Saran::findOrFail($id);
        $saran->delete();

        return back()->with('success', 'Saran dihapus.');
    }
}
