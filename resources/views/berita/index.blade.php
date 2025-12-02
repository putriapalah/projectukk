@extends('layouts.app')

@section('content')

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Berita BPN</h3>
                </div>
                <div class="card-body">
                    <a href="{{ route('berita.create') }}" class="btn btn-primary mb-3">Tambah Berita</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover">
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

                            <td>
                                @if($b->foto)
                                    <img src="{{ asset('img/berita/' . $b->foto) }}" 
                                         alt="Foto" width="80" style="border-radius: 6px;">
                                @else
                                    <span class="text-muted">Tidak ada foto</span>
                                @endif
                            </td>
                            <td>{{ $b->judul }}</td>
                            <td>{{ $b->isi }}</td>
                            <td>{{ \Carbon\Carbon::parse($b->tanggal_publikasi)->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('berita.edit', $b) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('berita.destroy', $b) }}" 
                                      method="POST" class="d-inline">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
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
