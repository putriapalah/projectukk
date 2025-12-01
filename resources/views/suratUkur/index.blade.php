@extends('layouts.app')

@section('title', 'Daftar Surat Ukur')

@section('content')
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Surat Ukur</h3>
                </div>
                <div class="card-body">
                    <a href="{{ route('suratUkur.create') }}" class="btn btn-primary mb-3">Tambah Data</a>

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
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
                            @forelse ($suratUkur as $item)
                                <tr>
                                    <td>{{ $item->kodeBT }}</td>
                                    <td>{{ $item->nama_kecamatan ?? '-' }}</td>
                                    <td>{{ $item->namaDesa ?? '-' }}</td>
                                    <td>{{ $item->jenis_hak ?? '-' }}</td>
                                    <td>{{ $item->lokasi_penyimpanan ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('suratUkur.edit', $item->kodeBT) }}"
                                            class="btn btn-sm btn-warning">EDIT</a>
                                        <form class="d-inline"
                                            onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus Data??');" <form
                                            action="{{ route('suratUkur.destroy', $item->kodeBT) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Data Surat Ukur belum tersedia.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
