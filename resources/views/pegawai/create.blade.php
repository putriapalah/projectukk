{{-- Isi form Create Pegawai di sini (Nama, NIP, Jabatan, Foto, dll.) --}}
@extends('layouts.app') 
@section('content')
<div class="container mt-4">
    <h2>Tambah Pegawai Baru</h2>
    <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
    

        <div class="mb-3">
            <label class="form-label">Foto Profil</label>
            <input type="file" name="foto_profil" class="form-control " accept="image/*">
            @error('foto_profil') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        
        <div class="mb-3">
            <label class="form-label">NIP</label>
            <input type="text" name="nip" class="form-control" value="{{ old('nip') }}" required>
           
        </div>
        
        <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap') }}" required>
           
        </div>
       
        <div class="mb-3">
            <label class="form-label">Nomor Telepon</label>
            <input type="text" name="nomor_telepon" class="form-control" value="{{ old('nomor_telepon') }}" required>
           
        </div>
      
        <div class="mb-3">
            <label class="form-label">Jabatan</label>
            <input type="text" name="jabatan" class="form-control " value="{{ old('jabatan') }}" required>
           
        </div>
       
        <div class="mb-3">
            <label class="form-label">Unit Kerja</label>
            <input type="text" name="unit_kerja" class="form-control " value="{{ old('unit_kerja') }}" required>
            
        </div>
        
        
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection