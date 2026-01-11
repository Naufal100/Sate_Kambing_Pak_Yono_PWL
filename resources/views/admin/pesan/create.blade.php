@extends('admin.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-8 offset-md-2">
            <h2>Tambah Pesan Baru</h2>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Terjadi Error!</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('pesan.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nomor_pesan">Nomor Pesan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('nomor_pesan') is-invalid @enderror"
                           id="nomor_pesan" name="nomor_pesan" value="{{ old('nomor_pesan') }}"
                           placeholder="Contoh: PES001" required>
                    @error('nomor_pesan')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="pelanggan">Nama Pelanggan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('pelanggan') is-invalid @enderror"
                               id="pelanggan" name="pelanggan" value="{{ old('pelanggan') }}"
                               placeholder="Nama pelanggan" required>
                        @error('pelanggan')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="no_meja">Nomor Meja</label>
                        <input type="number" class="form-control @error('no_meja') is-invalid @enderror"
                               id="no_meja" name="no_meja" value="{{ old('no_meja') }}"
                               placeholder="Nomor meja (opsional)">
                        @error('no_meja')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="catatan">Catatan / Nota</label>
                    <textarea class="form-control @error('catatan') is-invalid @enderror"
                              id="catatan" name="catatan" rows="4"
                              placeholder="Masukkan catatan atau daftar menu...">{{ old('catatan') }}</textarea>
                    @error('catatan')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="total">Total Harga (Rp) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('total') is-invalid @enderror"
                               id="total" name="total" value="{{ old('total') }}"
                               placeholder="0" step="0.01" min="0" required>
                        @error('total')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="status">Status <span class="text-danger">*</span></label>
                        <select class="form-control @error('status') is-invalid @enderror"
                                id="status" name="status" required>
                            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="diproses" {{ old('status') == 'diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="dibatalkan" {{ old('status') == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                        </select>
                        @error('status')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Pesan
                    </button>
                    <a href="{{ route('pesan.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
