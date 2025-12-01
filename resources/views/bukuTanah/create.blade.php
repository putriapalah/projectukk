@extends('layouts.app')
@section('content')
    <div class="row mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Formulir Tambah Data</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('bukuTanah.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="kodeBT">Kode BT</label>
                            <input id="kodeBT" name="kodeBT" class="form-control" value="{{ old('kodeBT') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="nama_kecamatan">Nama Kecamatan</label>
                            <input id="nama_kecamatan" name="nama_kecamatan" class="form-control"
                                value="{{ old('nama_kecamatan') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="namaDesa">Nama Desa</label>
                            <input id="namaDesa" name="namaDesa" class="form-control" value="{{ old('namaDesa') }}"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="jenis_hak">Jenis Hak</label>
                            <select id="jenis_hak" name="jenis_hak" class="form-control" required>
                                <option value="">Pilih</option>
                                <option value="Hak Milik" {{ old('jenis_hak') == 'Hak Milik' ? 'selected' : '' }}>Hak Milik
                                </option>
                                <option value="Hak Guna Bangun"
                                    {{ old('jenis_hak') == 'Hak Guna Bangun' ? 'selected' : '' }}>
                                    Hak Guna Bangun</option>
                                <option value="Hak Pakai" {{ old('jenis_hak') == 'Hak Pakai' ? 'selected' : '' }}>Hak Pakai
                                </option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="lokasi_penyimpanan">Lokasi Penyimpanan</label>
                            <input id="lokasi_penyimpanan" name="lokasi_penyimpanan" class="form-control"
                                value="{{ old('lokasi_penyimpanan') }}">
                        </div>

                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="{{ route('bukuTanah.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
