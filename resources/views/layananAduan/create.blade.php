@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Formulir Pengajuan Aduan</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Informasi Pemohon & Detail Aduan</h6>
        </div>

        <div class="card-body">
            <form action="{{ route('layananAduan.store') }}" method="POST">
                @csrf

                <!-- Nama Pemohon -->
                <div class="form-group mb-3">
                    <label>Nama Pemohon</label>
                    <input type="text" name="nama_pemohon"
                        class="form-control @error('nama_pemohon') is-invalid @enderror"
                        value="{{ old('nama_pemohon') }}" required>
                    @error('nama_pemohon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Nomor Telepon -->
                <div class="form-group mb-3">
                    <label>Nomor Telepon</label>
                    <input type="text" name="nomor_telepon_pemohon"
                        class="form-control @error('nomor_telepon_pemohon') is-invalid @enderror"
                        value="{{ old('nomor_telepon_pemohon') }}" required>
                    @error('nomor_telepon_pemohon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Deskripsi Aduan -->
                <div class="form-group mb-3">
                    <label>Deskripsi Aduan / Permohonan</label>
                    <textarea name="deskripsi_aduan" rows="5"
                        class="form-control @error('deskripsi_aduan') is-invalid @enderror"
                        required>{{ old('deskripsi_aduan') }}</textarea>
                    @error('deskripsi_aduan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tombol -->
                <button type="submit" class="btn btn-primary">Kirim Pengajuan</button>
                <a href="{{ route('layananAduan.index') }}" class="btn btn-secondary">Batal</a>

            </form>
        </div>
    </div>

</div>
@endsection
