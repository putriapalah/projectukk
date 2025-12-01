@extends('layouts.app')

@section('title', 'Daftar Buku Tanah')

@section('content')
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Buku Tanah</h3>
                </div>
                <div class="card-body">
                    <a href="{{ route('bukuTanah.create') }}" class="btn btn-primary mb-3">Tambah Data</a>

                    @if (session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger mt-3">
                            {{ session('error') }}
                        </div>
                    @endif

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Kode BT</th>
                                <th>Nama Kecamatan</th>
                                <th>Nama Desa</th>
                                <th>Jenis Hak</th>
                                <th>Lokasi Penyimpanan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bukuTanah as $item)
                                <tr>
                                    <td>{{ $item->kodeBT }}</td>
                                    <td>{{ $item->nama_kecamatan ?? '-' }}</td>
                                    <td>{{ $item->namaDesa ?? '-' }}</td>
                                    <td>{{ $item->jenis_hak ?? '-' }}</td>
                                    <td>{{ $item->lokasi_penyimpanan ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('bukuTanah.edit', $item->kodeBT) }}"
                                            class="btn btn-sm btn-warning">EDIT</a>
                                        <form class="d-inline"
                                            onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus Data??');" <form
                                            action="{{ route('bukuTanah.destroy', $item->kodeBT) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Data Buku Tanah belum Tersedia.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
