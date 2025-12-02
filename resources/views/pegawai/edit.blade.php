@extends('layouts.app') 
@section('content')
<div class="container mt-4">
    <h2>Edit Data Pegawai</h2>
    
    <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Foto Profil</label>
            
            @if ($pegawai->foto_profil)
                <div class="mb-2">
                    <img src="{{ asset('img/pegawai/' . $pegawai->foto_profil) }}" width="120" class="img-thumbnail">
                </div>
            @endif

            <input type="file" name="foto_profil" 
                   class="form-control @error('foto_profil') is-invalid @enderror" 
                   accept="image/*">
            @error('foto_profil') 
                <div class="invalid-feedback">{{ $message }}</div> 
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">NIP</label>
            <input type="text" name="nip" 
                   class="form-control" 
                   value="{{ old('nip', $pegawai->nip) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" 
                   class="form-control" 
                   value="{{ old('nama_lengkap', $pegawai->nama_lengkap) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nomor Telepon</label>
            <input type="text" name="nomor_telepon" 
                   class="form-control" 
                   value="{{ old('nomor_telepon', $pegawai->nomor_telepon) }}">

        </div>

        <div class="mb-3">
            <label class="form-label">Jabatan</label>
            <input type="text" name="jabatan" 
                   class="form-control" 
                   value="{{ old('jabatan', $pegawai->jabatan) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Unit Kerja</label>
            <input type="text" name="unit_kerja" 
                   class="form-control" 
                   value="{{ old('unit_kerja', $pegawai->unit_kerja) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
