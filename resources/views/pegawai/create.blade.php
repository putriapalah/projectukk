{{-- Isi form Create Pegawai di sini (Nama, NIP, Jabatan, Foto, dll.) --}}
@extends('layouts.app') 
@section('content')
<div class="container mt-4">
    <h2>Tambah Pegawai Baru</h2>
    <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- Foto Profil --}}
        <div class="mb-3">
            <label class="form-label">Foto Profil</label>
            <input type="file" name="foto_profil" class="form-control @error('foto_profil') is-invalid @enderror" accept="image/*">
            @error('foto_profil') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        {{-- NIP --}}
        <div class="mb-3">
            <label class="form-label">NIP</label>
            <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" value="{{ old('nip') }}" required>
            @error('nip') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        {{-- Nama Lengkap --}}
        <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" value="{{ old('nama_lengkap') }}" required>
            @error('nama_lengkap') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        {{-- Nomor Telepon --}}
        <div class="mb-3">
            <label class="form-label">Nomor Telepon</label>
            <input type="text" name="nomor_telepon" class="form-control @error('nomor_telepon') is-invalid @enderror" value="{{ old('nomor_telepon') }}" required>
            @error('nomor_telepon') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        {{-- Jabatan --}}
        <div class="mb-3">
            <label class="form-label">Jabatan</label>
            <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" value="{{ old('jabatan') }}" required>
            @error('jabatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        {{-- Unit Kerja --}}
        <div class="mb-3">
            <label class="form-label">Unit Kerja</label>
            <input type="text" name="unit_kerja" class="form-control @error('unit_kerja') is-invalid @enderror" value="{{ old('unit_kerja') }}" required>
            @error('unit_kerja') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        
        
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection