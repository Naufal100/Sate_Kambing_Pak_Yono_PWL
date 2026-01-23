<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    // Menampilkan daftar semua pesanan
    public function index()
    {
        if (!session()->has('loginadmin')) {
            return redirect('/login');
        }

        $pesananList = Pesanan::orderBy('created_at', 'desc')->get();
        return view('admin.pesanan', compact('pesananList'));
    }

    // Menampilkan halaman form create pesanan
    public function create()
    {
        if (!session()->has('loginadmin')) {
            return redirect('/login');
        }

        return view('admin.pesanan_create');
    }

    // Menyimpan pesanan baru ke database
    public function store(Request $request)
    {
        if (!session()->has('loginadmin')) {
            return redirect('/login');
        }

        $validated = $request->validate([
            'nama_pelanggan' => 'required|string|max:100',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'total_harga' => 'required|numeric|min:0',
            'catatan' => 'nullable|string',
        ]);

        Pesanan::create($validated);

        return redirect('/dashboard/pesanan')->with('success', 'Pesanan berhasil ditambahkan!');
    }

    // Menampilkan detail/nota pesanan
    public function show($id)
    {
        if (!session()->has('loginadmin')) {
            return redirect('/login');
        }

        $pesanan = Pesanan::findOrFail($id);
        return view('admin.pesanan_show', compact('pesanan'));
    }

    // Menampilkan halaman form edit pesanan
    public function edit($id)
    {
        if (!session()->has('loginadmin')) {
            return redirect('/login');
        }

        $pesanan = Pesanan::findOrFail($id);
        return view('admin.pesanan_edit', compact('pesanan'));
    }

    // Mengupdate pesanan di database
    public function update(Request $request, $id)
    {
        if (!session()->has('loginadmin')) {
            return redirect('/login');
        }

        $pesanan = Pesanan::findOrFail($id);

        $validated = $request->validate([
            'nama_pelanggan' => 'required|string|max:100',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'total_harga' => 'required|numeric|min:0',
            'status' => 'required|in:pending,diproses,selesai,dibatalkan',
            'catatan' => 'nullable|string',
        ]);

        $pesanan->update($validated);

        return redirect('/dashboard/pesanan')->with('success', 'Pesanan berhasil diperbarui!');
    }

    // Menghapus pesanan dari database
    public function destroy($id)
    {
        if (!session()->has('loginadmin')) {
            return redirect('/login');
        }

        $pesanan = Pesanan::findOrFail($id);
        $pesanan->delete();

        return redirect('/dashboard/pesanan')->with('success', 'Pesanan berhasil dihapus!');
    }

    // Menampilkan form pesan langsung
    public function pesanLangsung($menuId)
    {
        $menu = \App\Models\Menu::findOrFail($menuId);
        $allMenus = \App\Models\Menu::where('stok', '>', 0)->get();
        return view('pelanggan.pesan_langsung', compact('menu', 'allMenus'));
    }

    // Menyimpan pesanan dari pesan langsung
    public function pesanLangsungSimpan(Request $request, $menuId)
    {
        $validated = $request->validate([
            'jumlah' => 'required|numeric|min:1',
            'nama_pelanggan' => 'required|string|max:100',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        $menu = \App\Models\Menu::findOrFail($menuId);
        $totalHarga = $menu->harga * $validated['jumlah'];

        $pesanan = Pesanan::create([
            'nama_pelanggan' => $validated['nama_pelanggan'],
            'no_hp' => $validated['no_hp'],
            'alamat' => $validated['alamat'],
            'total_harga' => $totalHarga,
            'catatan' => $validated['catatan'] ?? null,
            'status' => 'pending',
        ]);

        \App\Models\DetailPesanan::create([
            'pesanan_id' => $pesanan->id,
            'id_menu' => $menuId,
            'qty' => $validated['jumlah'],
            'harga_satuan' => $menu->harga,
            'subtotal' => $totalHarga,
        ]);

        return redirect('/pesanan-berhasil/' . $pesanan->id)->with('success', 'Pesanan berhasil dibuat!');
    }

    // Halaman sukses pesanan
    public function pesananBerhasil($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $details = \App\Models\DetailPesanan::where('pesanan_id', $id)->get();
        return view('pelanggan.pesanan_berhasil', compact('pesanan', 'details'));
    }
}
