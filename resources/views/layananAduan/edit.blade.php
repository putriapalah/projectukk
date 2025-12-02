@extends('layouts.app')

@section('content')
<div class="container">

    <h2>Edit Aduan</h2>

    <form method="POST" action="{{ route('admin.aduan.update', $aduan->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="Menunggu" {{ $aduan->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                <option value="Diproses" {{ $aduan->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="Selesai" {{ $aduan->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
    </form>

</div>
@endsection
