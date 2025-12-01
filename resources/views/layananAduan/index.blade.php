@extends('layouts.app')

@section('content')
<div class="container">

    <h2 class="mb-4">Kelola Aduan Masyarakat</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No. Telepon</th>
                <th>Aduan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($aduan as $index => $a)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $a->nama_pemohon }}</td>
                <td>{{ $a->nomor_telepon_pemohon }}</td>
                <td>{{ Str::limit($a->deskripsi_aduan, 60) }}</td>
                <td>{{ $a->status }}</td>

                <td>
                    <a href="{{ route('admin.aduan.edit', $a->id) }}"
                       class="btn btn-warning btn-sm">EDIT</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
