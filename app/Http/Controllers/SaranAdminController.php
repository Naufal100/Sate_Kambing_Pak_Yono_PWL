<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Models\Saran;

class SaranAdminController extends Controller
{
    public function index()
    {
        if (!session()->has('loginadmin')) {
            return redirect('/login');
        }
        
        // Ambil semua saran + data pelanggan
        $sarans = Saran::with('pelanggan')->latest()->get();
        return view('admin.saran', compact('sarans'));
    }

    public function destroy($id)
    {
        Saran::findOrFail($id)->delete();
        return back()->with('success', 'Saran berhasil dihapus.');
    }
}
