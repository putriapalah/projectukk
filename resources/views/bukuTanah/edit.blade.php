@extends('layouts.app')
@section('content')
    <div class="row mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Formulir Edit Data</h3>
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

                    <form action="{{ route('bukuTanah.update', $bukuTanah->kodeBT) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="kodeBT">Kode BT</label>
                            <input id="kodeBT" name="kodeBT" class="form-control"
                                value="{{ old('kodeBT', $bukuTanah->kodeBT) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="nama_kecamatan">Nama Kecamatan</label>
                            <input id="nama_kecamatan" name="nama_kecamatan" class="form-control"
                                value="{{ old('nama_kecamatan', $bukuTanah->nama_kecamatan) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="namaDesa">Nama Desa</label>
                            <input id="namaDesa" name="namaDesa" class="form-control"
                                value="{{ old('namaDesa', $bukuTanah->namaDesa) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="jenis_hak">Jenis Hak</label>
                            <select id="jenis_hak" name="jenis_hak" class="form-control" required>
                                @php $options = ['Hak Milik','Hak Guna Bangun','Hak Pakai']; @endphp
                                @foreach ($options as $opt)
                                    <option value="{{ $opt }}"
                                        {{ old('jenis_hak', $bukuTanah->jenis_hak) === $opt ? 'selected' : '' }}>
                                        {{ $opt }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="lokasi_penyimpanan">Lokasi Penyimpanan</label>
                            <input id="lokasi_penyimpanan" name="lokasi_penyimpanan" class="form-control"
                                value="{{ old('lokasi_penyimpanan', $bukuTanah->lokasi_penyimpanan) }}">
                        </div>

                        <button class="btn btn-primary" type="submit">Update</button>
                        <a href="{{ route('bukuTanah.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
