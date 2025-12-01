@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Berita BPN</h2>
        <a href="{{ route('berita.create') }}" class="btn btn-primary">Tambah Berita</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Judul</th>
                        <th>Isi</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($berita as $b)
                        <tr>

                            {{-- FOTO --}}
                            <td>
                                @if($b->foto)
                                    <img src="{{ asset('img/berita/' . $b->foto) }}" 
                                         alt="Foto" width="80" style="border-radius: 6px;">
                                @else
                                    <span class="text-muted">Tidak ada foto</span>
                                @endif
                            </td>

                            {{-- JUDUL --}}
                            <td>{{ $b->judul }}</td>

                            {{-- ISI (dibatasi biar tidak panjang) --}}
                            <td>{!! Str::limit(strip_tags($b->isi), 50, '...') !!}</td>

                            {{-- TANGGAL --}}
                            <td>{{ \Carbon\Carbon::parse($b->tanggal_publikasi)->format('d M Y') }}</td>

                            {{-- STATUS --}}
                            <td>
                                <span class="badge bg-{{ $b->status == 'terbit' ? 'success' : 'warning' }}">
                                    {{ ucfirst($b->status) }}
                                </span>
                            </td>

                            {{-- AKSI --}}
                            <td>
                                <a href="{{ route('berita.edit', $b) }}" class="btn btn-sm btn-outline-primary">Edit</a>

                                <form action="{{ route('berita.destroy', $b) }}" 
                                      method="POST" class="d-inline">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Hapus berita ini?')">Hapus</button>
                                </form>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada berita.</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection
