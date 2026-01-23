<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Pelanggan;

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

        $pesananList = \App\Models\Pesanan::orderBy('created_at', 'desc')->get();
        return view('admin.pesanan', compact('pesananList'));
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

        $admin = Admin::where('username', session('admin_username'))->first();

        return view('admin.profil', compact('admin'));
    }

    public function editProfil()
    {
        if (!session()->has('loginadmin')) {
            return redirect('/login');
        }

        $admin = Admin::where('username', session('admin_username'))->first();

        return view('admin.edit_profil', compact('admin'));
    }

    public function updateProfil(Request $request)
    {
        if (!session()->has('loginadmin')) {
            return redirect('/login');
        }

        $admin = Admin::where('username', session('admin_username'))->first();

        if (!$admin) {
            return redirect('/dashboard/profil')->with('error', 'Admin tidak ditemukan');
        }

        $request->validate([
            'username' => 'required|string',
            'email' => 'nullable|email|unique:admin,email,'. $admin->id_admin.',id_admin',
            'no_hp' => 'nullable|string|unique:admin,no_hp,'.$admin->id_admin.',id_admin',
            'password' => 'nullable|string|min:5'
        ]);

        $admin->username = $request->username;
        $admin->no_hp = $request->no_hp;
        $admin->email = $request->email;

        if ($request->filled('password')) {
            $admin->password = $request->password; //kata sandi disimpan tanpa enkripsi

        }

        $admin->save();

        session([
            'admin_username' => $admin->username,
            'admin_phone' => $admin->no_hp,
            'admin_email' => $admin->email,
        ]);

        return redirect('/dashboard/profil')->with('success', 'Profil berhasil diperbarui');
    }

    public function daftarAdmin()
    {
        if (!session()->has('loginadmin')) {
            return redirect('/login');
        }

        $admins = Admin::orderBy('username')->get();

        return view('admin.daftar_admin', compact('admins'));
    }

    public function createAdmin()
    {
        if (!session()->has('loginadmin')) {
            return redirect('/login');
        }

        return view('admin.create_admin');
    }

    public function simpanAdmin(Request $request)
    {
        if (!session()->has('loginadmin')) {
            return redirect('/login');
        }

    $request->validate([
        'username' => 'required|string|unique:admin,username',
        'email' => 'nullable|email|unique:admin,email',
        'no_hp' => 'nullable|string|unique:admin,no_hp',
        'password' => 'required|string|min:4'
    ]);

    // ambil id_admin terbesar (angka)
    $lastId = Admin::max('id_admin');

    // jika belum ada data, mulai dari 1
    $newId = $lastId ? ((int) $lastId + 1) : 1;

    Admin::create([
        'id_admin' => $newId,
        'username' => $request->username,
        'password' => $request->password, //tanpa hash
        'no_hp' => $request->no_hp,
        'email' => $request->email,
    ]);

        return redirect('/dashboard/daftaradmin')
            ->with('success', 'Admin baru berhasil ditambahkan');
    }

    public function deleteAdmin($id)
    {
        if (!session()->has('loginadmin')) {
            return redirect('/login');
        }

        //admin yang sedang login
        $sekarang = Admin::where('username', session('admin_username'))->first();

        //cegah hapus diri sendiri
        if ($sekarang && $sekarang->id_admin == $id) {
            return redirect('/dashboard/daftaradmin')
                ->with('error', 'Tidak bisa menghapus admin yang sedang login');
        }

        $admin = Admin::where('id_admin', $id)->first();

        if (!$admin) {
            return redirect('/dashboard/daftaradmin')
                ->with('error', 'Admin tidak ditemukan');
        }

        $admin->delete();

        return redirect('/dashboard/daftaradmin')
            ->with('success', 'Admin berhasil dihapus');
    }


    public function kelolaPelanggan()
    {
        if (!session()->has('loginadmin')) {
            return redirect('/login');
        }

        $pelanggan = Pelanggan::orderBy('username')->get();
        return view('admin.kelola_pelanggan', compact('pelanggan'));
    }

    // --- TAMBAHAN UNTUK EDIT & HAPUS PELANGGAN ---

    public function editPelanggan($id)
    {
        if (!session()->has('loginadmin')) {
            return redirect('/login');
        }

        // Cari pelanggan berdasarkan id_user
        $pelanggan = Pelanggan::where('id_user', $id)->first();

        if (!$pelanggan) {
            return redirect('/dashboard/pelanggan')->with('error', 'Data pelanggan tidak ditemukan');
        }

        return view('admin.edit_pelanggan', compact('pelanggan'));
    }

    public function updatePelanggan(Request $request, $id)
    {
        if (!session()->has('loginadmin')) {
            return redirect('/login');
        }

        $pelanggan = Pelanggan::where('id_user', $id)->first();

        if (!$pelanggan) {
            return redirect('/dashboard/pelanggan')->with('error', 'Data pelanggan tidak ditemukan');
        }

        // Validasi input
        $request->validate([
            'username' => 'required|string|max:50',
            // Email harus unik, tapi kecualikan ID pelanggan yang sedang diedit ini
            'email' => 'required|email|max:100|unique:pelanggan,email_pelanggan,'.$id.',id_user',
            'no_hp' => 'nullable|string|max:15',
            'password' => 'nullable|string|min:4' // Password opsional (diisi jika ingin diganti)
        ]);

        // Update data
        $pelanggan->username = $request->username;
        $pelanggan->email_pelanggan = $request->email;
        $pelanggan->no_tlp = $request->no_hp;

        // Cek jika admin mengisi password baru
        if ($request->filled('password')) {
            $pelanggan->password = $request->password;
        }

        $pelanggan->save();

        return redirect('/dashboard/pelanggan')->with('success', 'Data pelanggan berhasil diperbarui');
    }

    public function deletePelanggan($id)
    {
        if (!session()->has('loginadmin')) {
            return redirect('/login');
        }

        $pelanggan = Pelanggan::where('id_user', $id)->first();

        if ($pelanggan) {
            $pelanggan->delete();
            return redirect('/dashboard/pelanggan')->with('success', 'Pelanggan berhasil dihapus');
        }

        return redirect('/dashboard/pelanggan')->with('error', 'Gagal menghapus, data tidak ditemukan');
    }


}
