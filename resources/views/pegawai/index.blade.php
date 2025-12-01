@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-body">

            <h3 class="mb-4">Data Pegawai</h3>

            <a href="{{ route('pegawai.create') }}" class="btn btn-primary mb-3">
                Tambah Data
            </a>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>Foto</th>
                            <th>NIP</th>
                            <th>Nama Lengkap</th>
                            <th>Jabatan</th>
                            <th>Nomor Telepon</th>
                            <th>Unit Kerja</th>
                            <th width="160px">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($pegawai as $p)
                        <tr>
                            <td class="text-center">
                                @if ($p->foto_profil)
                                    <img src="{{ asset('img/pegawai/' . $p->foto_profil) }}"
                                         alt="{{ $p->nama_lengkap }}"
                                         width="50" height="50"
                                         class="rounded-circle">
                                @else
                                    -
                                @endif
                            </td>

                            <td>{{ $p->nip }}</td>
                            <td>{{ $p->nama_lengkap }}</td>
                            <td>{{ $p->jabatan }}</td>
                            <td>{{ $p->nomor_telepon ?? '-' }}</td>
                            <td>{{ $p->unit_kerja }}</td>
                            
                            <td class="text-center">
                                <a href="{{ route('pegawai.edit', $p->id) }}" 
                                   class="btn btn-warning btn-sm">
                                    EDIT
                                </a>

                                <form action="{{ route('pegawai.destroy', $p->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-danger btn-sm">
                                        HAPUS
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Belum ada data pegawai.</td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>
@endsection
