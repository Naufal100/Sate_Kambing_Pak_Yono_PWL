<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Berhasil - Warung Sate</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-gradient-to-r from-orange-600 to-yellow-500 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 py-4">
            <h1 class="text-2xl font-bold">Warung Sate</h1>
        </div>
    </header>

    <main class="max-w-4xl mx-auto px-4 py-12">
        <!-- Success Message -->
        <div class="bg-green-50 border-2 border-green-500 rounded-lg p-8 mb-8 text-center">
            <div class="text-6xl mb-4">✓</div>
            <h2 class="text-3xl font-bold text-green-700 mb-2">Pesanan Berhasil!</h2>
            <p class="text-gray-700">Pesanan Anda telah kami terima dan sedang diproses</p>
        </div>

        <!-- Order Details -->
        <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
            <!-- Header -->
            <div class="flex justify-between items-start mb-6 pb-6 border-b-2">
                <div>
                    <p class="text-sm text-gray-600 mb-1">Nomor Pesanan</p>
                    <h3 class="text-3xl font-bold text-gray-800">#{{ $pesanan->id }}</h3>
                </div>
                <span class="px-4 py-2 rounded-full text-white font-semibold bg-yellow-500">
                    {{ ucfirst($pesanan->status) }}
                </span>
            </div>

            <!-- Data Pemesan -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 pb-8 border-b">
                <div>
                    <p class="text-sm text-gray-600 mb-1">Nama Pemesan</p>
                    <p class="font-semibold text-lg">{{ $pesanan->nama_pelanggan }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600 mb-1">No. Telepon</p>
                    <p class="font-semibold text-lg">{{ $pesanan->no_hp }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600 mb-1">Tanggal Pesanan</p>
                    <p class="font-semibold text-lg">{{ $pesanan->created_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>

            <!-- Alamat -->
            <div class="mb-8 pb-8 border-b">
                <p class="text-sm text-gray-600 mb-1">Alamat Pengiriman</p>
                <p class="font-semibold text-gray-800">{{ $pesanan->alamat }}</p>
            </div>

            <!-- Detail Items -->
            <div class="mb-8">
                <h4 class="text-xl font-bold text-gray-800 mb-4">Detail Pesanan</h4>
                <table class="w-full">
                    <thead class="bg-gray-100 border-b-2">
                        <tr>
                            <th class="text-left px-4 py-3 font-semibold">Menu</th>
                            <th class="text-right px-4 py-3 font-semibold">Harga</th>
                            <th class="text-center px-4 py-3 font-semibold">Jumlah</th>
                            <th class="text-right px-4 py-3 font-semibold">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($details as $detail)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-3">
                                    @php
                                        $menu = \App\Models\Menu::find($detail->id_menu);
                                    @endphp
                                    <span class="font-semibold">{{ $menu->nama_menu ?? 'Menu Tidak Ditemukan' }}</span>
                                </td>
                                <td class="px-4 py-3 text-right">Rp {{ number_format($detail->harga_satuan, 0, ',', '.') }}</td>
                                <td class="px-4 py-3 text-center">{{ $detail->jumlah }}</td>
                                <td class="px-4 py-3 text-right font-bold text-orange-600">Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Catatan -->
            @if($pesanan->catatan)
                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-8">
                    <p class="font-semibold text-gray-800 mb-1">Catatan:</p>
                    <p class="text-gray-700">{{ $pesanan->catatan }}</p>
                </div>
            @endif

            <!-- Total -->
            <div class="border-t-2 pt-6 flex justify-end mb-8">
                <div class="w-full md:w-1/3">
                    <div class="flex justify-between text-lg mb-3">
                        <span class="text-gray-800">Subtotal:</span>
                        <span>Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between text-3xl font-bold border-t-2 pt-3">
                        <span class="text-gray-800">Total:</span>
                        <span class="text-orange-600">Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Info Box -->
        <div class="bg-blue-50 border-2 border-blue-200 rounded-lg p-6 mb-8">
            <h4 class="font-bold text-gray-800 mb-3">📋 Apa yang terjadi selanjutnya?</h4>
            <ul class="text-gray-700 space-y-2">
                <li>✓ Kami akan mengkonfirmasi pesanan Anda melalui WhatsApp ke {{ $pesanan->no_hp }}</li>
                <li>✓ Status pesanan dapat dipantau di aplikasi kami</li>
                <li>✓ Pesanan akan diproses dalam waktu 1-2 jam</li>
                <li>✓ Pengiriman dilakukan sesuai alamat yang Anda berikan</li>
            </ul>
        </div>

        <!-- Buttons -->
        <div class="flex gap-4">
            <a href="/" class="flex-1 bg-gray-500 text-white py-3 rounded-lg hover:bg-gray-600 font-semibold text-center">
                Kembali ke Beranda
            </a>
            <a href="/pesan/langsung/MN01" class="flex-1 bg-orange-600 text-white py-3 rounded-lg hover:bg-orange-700 font-semibold text-center">
                Pesan Menu Lain
            </a>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-12">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; 2026 Warung Sate. Terima kasih telah memesan!</p>
        </div>
    </footer>
</body>
</html>
