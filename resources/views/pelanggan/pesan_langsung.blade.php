<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan {{ $menu->nama_menu }} - Warung Sate</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-gradient-to-r from-orange-600 to-yellow-500 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 py-4">
            <h1 class="text-2xl font-bold"> Warung Sate</h1>
        </div>
    </header>

    <main class="max-w-2xl mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-2">Pesan {{ $menu->nama_menu }}</h2>
        <p class="text-gray-600 mb-8">Rp {{ number_format($menu->harga, 0, ',', '.') }} per item</p>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                @foreach ($errors->all() as $error)
                    <p>• {{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form id="pesananForm" action="/pesan/langsung/{{ $menu->id_menu }}" method="POST" class="bg-white rounded-lg shadow-lg p-8">
            @csrf

            <!-- Menu Info -->
            <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-8">
                <p class="font-semibold text-gray-800">Menu yang dipilih:</p>
                <p class="text-lg text-gray-700">{{ $menu->nama_menu }}</p>
                <p class="text-sm text-gray-600">{{ $menu->deskripsi_menu }}</p>
            </div>

            <!-- Jumlah -->
            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Jumlah Pesanan</label>
                <div class="flex items-center gap-4">
                    <button type="button" onclick="decrementQty()" class="bg-gray-300 text-gray-800 w-10 h-10 rounded hover:bg-gray-400 font-bold">−</button>
                    <input type="number" id="jumlah" name="jumlah" value="{{ old('jumlah', 1) }}" min="1" required
                        class="w-24 px-4 py-2 border border-gray-300 rounded-lg text-center text-xl font-bold focus:outline-none focus:border-orange-600" />
                    <button type="button" onclick="incrementQty()" class="bg-gray-300 text-gray-800 w-10 h-10 rounded hover:bg-gray-400 font-bold">+</button>
                    <span class="text-gray-600 ml-4">
                        Total: <span id="totalHarga" class="font-bold text-orange-600">Rp {{ number_format($menu->harga, 0, ',', '.') }}</span>
                    </span>
                </div>
                @error('jumlah')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <hr class="my-8">

            <!-- Data Pelanggan -->
            <h3 class="text-xl font-bold text-gray-800 mb-4">Data Pemesan</h3>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Nama Lengkap <span class="text-red-600">*</span></label>
                <input type="text" name="nama_pelanggan" value="{{ old('nama_pelanggan') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-600"
                    placeholder="Masukkan nama Anda" />
                @error('nama_pelanggan')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">No. Telepon <span class="text-red-600">*</span></label>
                <input type="tel" name="no_hp" value="{{ old('no_hp') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-600"
                    placeholder="08123456789" />
                @error('no_hp')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Alamat Pengiriman <span class="text-red-600">*</span></label>
                <textarea name="alamat" rows="3" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-600"
                    placeholder="Jl. Contoh No. 123, Kota...">{{ old('alamat') }}</textarea>
                @error('alamat')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Catatan (Opsional)</label>
                <textarea name="catatan" rows="2"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-600"
                    placeholder="Contoh: tidak pedas, extra bumbu, dll">{{ old('catatan') }}</textarea>
            </div>

            <!-- Buttons -->
            <div class="flex gap-4 pt-4 border-t">
                <a href="javascript:history.back()" class="flex-1 bg-gray-500 text-white py-3 rounded-lg hover:bg-gray-600 transition text-center font-semibold">
                    Batal
                </a>
                <button type="submit" class="flex-1 bg-orange-600 text-white py-3 rounded-lg hover:bg-orange-700 transition font-semibold">
                    Pesan Sekarang
                </button>
            </div>
        </form>
    </main>

    <script>
        const hargaSatuan = {{ $menu->harga }};

        function updateTotal() {
            const jumlah = parseInt(document.getElementById('jumlah').value) || 1;
            const total = hargaSatuan * jumlah;
            document.getElementById('totalHarga').textContent = 'Rp ' + total.toLocaleString('id-ID');
        }

        function incrementQty() {
            const input = document.getElementById('jumlah');
            input.value = parseInt(input.value) + 1;
            updateTotal();
        }

        function decrementQty() {
            const input = document.getElementById('jumlah');
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
                updateTotal();
            }
        }

        document.getElementById('jumlah').addEventListener('change', updateTotal);

        // Debug form submission
        document.getElementById('pesananForm').addEventListener('submit', function(e) {
            console.log('Form submitted!');
            console.log('Form action:', this.action);
            console.log('Form method:', this.method);
            console.log('Form data:', {
                jumlah: document.querySelector('[name="jumlah"]').value,
                nama_pelanggan: document.querySelector('[name="nama_pelanggan"]').value,
                no_hp: document.querySelector('[name="no_hp"]').value,
                alamat: document.querySelector('[name="alamat"]').value
            });
        });
    </script>
</body>
</html>
