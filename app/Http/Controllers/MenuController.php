<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menu', compact('menus'));
    }

    public function create()
    {
        return view('admin.menu_create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_menu'      => 'required|string|max:50',
            'kategori'       => 'required|in:makanan,minuman',
            'harga'          => 'required|integer',
            'stok'           => 'required|integer',
            'deskripsi_menu' => 'required|string',
            'foto_menu'      => 'nullable|image|max:2048',
        ]);

        $validated['id_menu'] = 'MN-' . mt_rand(10000, 99999);
        $validated['rating'] = 5;

        if ($request->file('foto_menu')) {
            $validated['foto_menu'] = $request->file('foto_menu')
                ->store('images', 'public');
        }

        Menu::create($validated);

        return redirect()->route('menu.index')->with('success', 'Menu Berhasil Ditambah!');
    }

    public function edit($id)
    {
        $menu = Menu::where('id_menu', $id)->firstOrFail();
        return view('admin.menu_edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::where('id_menu', $id)->firstOrFail();

        $validated = $request->validate([
            'nama_menu'      => 'required|string|max:50',
            'kategori'       => 'required|in:makanan,minuman',
            'harga'          => 'required|integer',
            'stok'           => 'required|integer',
            'deskripsi_menu' => 'required|string',
            'foto_menu'      => 'nullable|image|max:2048',
        ]);

        if ($request->file('foto_menu')) {
            if ($menu->foto_menu) {
                Storage::disk('public')->delete($menu->foto_menu);
            }
            $validated['foto_menu'] = $request->file('foto_menu')
                ->store('images', 'public');
        }

        $menu->update($validated);

        return redirect()->route('menu.index')->with('success', 'Menu Berhasil Diupdate!');
    }

    public function destroy($id)
    {
        $menu = Menu::where('id_menu', $id)->firstOrFail();

        if ($menu->foto_menu) {
            Storage::disk('public')->delete($menu->foto_menu);
        }

        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Menu Berhasil Dihapus!');
    }
}
