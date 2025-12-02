@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <h2>Edit Berita</h2>


        <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Foto</label>
                <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                @error('foto')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                @if ($berita->foto)
                    <div class="mt-2">
                        <img src="{{ asset('img/berita/' . $berita->foto) }}" alt="Foto Berita" width="150" class="img-thumbnail">
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control"
                    value="{{ old('judul', $berita->judul) }}" required>
            </div>

           

            <div class="mb-3">
                <label class="form-label">Tanggal Publikasi</label>
                <input type="date" name="tanggal_publikasi" class="form-control"
                    value="{{ old('tanggal_publikasi', $berita->tanggal_publikasi) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select" required>
                    <option value="draft" {{ old('status', $berita->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="terbit" {{ old('status', $berita->status) == 'terbit' ? 'selected' : '' }}>Terbit</option>
                </select>
              
            </div>

            <div class="mb-3">
                <label class="form-label">Isi Berita</label>
                <textarea name="isi" class="form-control " id="editor" required>{{ old('isi', $berita->isi) }}</textarea>
               
            </div>

            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
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