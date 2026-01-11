<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function __construct()
    {
        // Validasi session login
        if (!session()->has('loginadmin')) {
            redirect('/login')->send();
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesans = Pesan::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pesan.index', compact('pesans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pesan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_pesan' => 'required|unique:pesans',
            'pelanggan' => 'required|string',
            'no_meja' => 'nullable|integer',
            'catatan' => 'nullable|string',
            'total' => 'required|numeric|min:0',
            'status' => 'required|in:pending,diproses,selesai,dibatalkan',
        ]);

        Pesan::create($validated);

        return redirect()->route('pesan.index')->with('success', 'Pesan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pesan $pesan)
    {
        return view('admin.pesan.show', compact('pesan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesan $pesan)
    {
        return view('admin.pesan.edit', compact('pesan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pesan $pesan)
    {
        $validated = $request->validate([
            'nomor_pesan' => 'required|unique:pesans,nomor_pesan,' . $pesan->id,
            'pelanggan' => 'required|string',
            'no_meja' => 'nullable|integer',
            'catatan' => 'nullable|string',
            'total' => 'required|numeric|min:0',
            'status' => 'required|in:pending,diproses,selesai,dibatalkan',
        ]);

        $pesan->update($validated);

        return redirect()->route('pesan.index')->with('success', 'Pesan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pesan $pesan)
    {
        $pesan->delete();

        return redirect()->route('pesan.index')->with('success', 'Pesan berhasil dihapus!');
    }
}
