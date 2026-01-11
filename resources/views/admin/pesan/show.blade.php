@extends('admin.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-8 offset-md-2">
            <h2>Detail Pesan #{{ $pesan->nomor_pesan }}</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <!-- Kartu Nota -->
            <div class="card mb-3" id="printable-section">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">NOTA PESANAN</h5>
                </div>
                <div class="card-body">
                    <!-- Header Nota -->
                    <div class="text-center mb-4 pb-3 border-bottom">
                        <h6 class="mb-0"><strong>WARUNG SATE</strong></h6>
                        <small class="text-muted">Tanggal: {{ $pesan->created_at->format('d/m/Y H:i') }}</small>
                    </div>

                    <!-- Detail Pesan -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p>
                                <strong>No. Pesan:</strong> {{ $pesan->nomor_pesan }}<br>
                                <strong>Pelanggan:</strong> {{ $pesan->pelanggan }}
                            </p>
                        </div>
                        <div class="col-md-6 text-right">
                            <p>
                                <strong>No. Meja:</strong> {{ $pesan->no_meja ?? '-' }}<br>
                                <strong>Status:</strong>
                                @if ($pesan->status == 'pending')
                                    <span class="badge badge-warning">Pending</span>
                                @elseif ($pesan->status == 'diproses')
                                    <span class="badge badge-info">Diproses</span>
                                @elseif ($pesan->status == 'selesai')
                                    <span class="badge badge-success">Selesai</span>
                                @else
                                    <span class="badge badge-danger">Dibatalkan</span>
                                @endif
                            </p>
                        </div>
                    </div>

                    <!-- Garis Pemisah -->
                    <hr class="my-3">

                    <!-- Catatan/Menu -->
                    @if ($pesan->catatan)
                        <div class="mb-4">
                            <h6 class="mb-2"><strong>DAFTAR PESANAN:</strong></h6>
                            <div class="bg-light p-3 rounded">
                                <p class="mb-0" style="white-space: pre-wrap; word-wrap: break-word;">
                                    {{ $pesan->catatan }}
                                </p>
                            </div>
                        </div>
                    @endif

                    <!-- Total -->
                    <div class="border-top border-bottom py-3 mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="text-right">Total Bayar:</h6>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-right">
                                    <strong>Rp {{ number_format($pesan->total, 0, ',', '.') }}</strong>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Nota -->
                    <div class="text-center text-muted">
                        <small>
                            Terima kasih telah berkunjung<br>
                            Terakhir diperbarui: {{ $pesan->updated_at->format('d/m/Y H:i') }}
                        </small>
                    </div>
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('pesan.edit', $pesan->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit Pesan
                    </a>
                    <button type="button" class="btn btn-info" onclick="printNota()">
                        <i class="fas fa-print"></i> Cetak Nota
                    </button>
                    <form action="{{ route('pesan.destroy', $pesan->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus pesan ini?')">
                            <i class="fas fa-trash"></i> Hapus Pesan
                        </button>
                    </form>
                    <a href="{{ route('pesan.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function printNota() {
    var printSection = document.getElementById('printable-section');
    var printWindow = window.open('', '', 'height=600,width=800');

    printWindow.document.write(`
        <html>
            <head>
                <title>Nota Pesan #{{ $pesan->nomor_pesan }}</title>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                <style>
                    @media print {
                        body { margin: 0; padding: 10px; }
                    }
                    body { font-family: Arial, sans-serif; }
                    .print-header { text-align: center; margin-bottom: 20px; }
                    hr { margin: 10px 0; }
                </style>
            </head>
            <body>
    `);

    printWindow.document.write(printSection.innerHTML);

    printWindow.document.write(`
            </body>
        </html>
    `);

    printWindow.document.close();

    setTimeout(function() {
        printWindow.print();
    }, 250);
}
</script>
@endsection
