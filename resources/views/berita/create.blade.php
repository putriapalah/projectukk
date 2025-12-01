@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <h2>{{ isset($berita) ? 'Edit Berita' : 'Tambah Berita' }}</h2>

        <form action="{{ isset($berita) ? route('berita.update', $berita) : route('berita.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @isset($berita)
                @method('PUT')
            @endisset

            <!-- Foto -->
            <div class="mb-3">
                <label class="form-label">Foto</label>
                <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                @error('foto')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                @if (isset($berita) && $berita->foto)
                    <div class="mt-2">
                        <img src="{{ asset('img/berita/' . $berita->foto) }}" alt="Foto Berita" width="150" class="img-thumbnail">
                    </div>
                @endif
            </div>

            <!-- Judul -->
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                    value="{{ old('judul', $berita->judul ?? '') }}" required>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

        

            <!-- Tanggal Publikasi -->
            <div class="mb-3">
                <label class="form-label">Tanggal Publikasi</label>
                <input type="date" name="tanggal_publikasi" class="form-control @error('tanggal_publikasi') is-invalid @enderror"
                    value="{{ old('tanggal_publikasi', $berita->tanggal_publikasi ?? date('Y-m-d')) }}" required>
                @error('tanggal_publikasi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Status -->
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                    <option value="draft" {{ old('status', $berita->status ?? 'draft') == 'draft' ? 'selected' : '' }}>
                        Draft</option>
                    <option value="terbit" {{ old('status', $berita->status ?? '') == 'terbit' ? 'selected' : '' }}>Terbit
                    </option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Isi Berita -->
            <div class="mb-3">
                <label class="form-label">Isi Berita</label>
                <textarea name="isi" class="form-control @error('isi') is-invalid @enderror" id="editor" required>{{ old('isi', $berita->isi ?? '') }}</textarea>
                @error('isi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tombol Simpan & Batal -->
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('berita.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    @push('scripts')
        <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('editor');
        </script>
    @endpush
@endsection