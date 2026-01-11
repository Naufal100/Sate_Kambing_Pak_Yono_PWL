@extends('admin.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>Daftar Pesan</h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('pesan.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Pesan
            </a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nomor Pesan</th>
                        <th>Pelanggan</th>
                        <th>No Meja</th>
                        <th>Total (Rp)</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pesans as $pesan)
                        <tr>
                            <td>{{ ($pesans->currentPage() - 1) * $pesans->perPage() + $loop->iteration }}</td>
                            <td><strong>{{ $pesan->nomor_pesan }}</strong></td>
                            <td>{{ $pesan->pelanggan }}</td>
                            <td>{{ $pesan->no_meja ?? '-' }}</td>
                            <td>Rp {{ number_format($pesan->total, 0, ',', '.') }}</td>
                            <td>
                                @if ($pesan->status == 'pending')
                                    <span class="badge badge-warning">Pending</span>
                                @elseif ($pesan->status == 'diproses')
                                    <span class="badge badge-info">Diproses</span>
                                @elseif ($pesan->status == 'selesai')
                                    <span class="badge badge-success">Selesai</span>
                                @else
                                    <span class="badge badge-danger">Dibatalkan</span>
                                @endif
                            </td>
                            <td>{{ $pesan->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <a href="{{ route('pesan.show', $pesan->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('pesan.edit', $pesan->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('pesan.destroy', $pesan->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Belum ada pesan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $pesans->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
