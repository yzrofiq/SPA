@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Tagihan</h1>

        <form action="{{ route('tagihans.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="pelanggan_id" class="form-label">Pelanggan</label>
                <select name="pelanggan_id" class="form-select" required>
                    <option value="">Pilih Pelanggan</option>
                    @foreach ($pelanggans as $pelanggan)
                        <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="bulan" class="form-label">Bulan</label>
                <input type="number" name="bulan" class="form-control" required min="1" max="12">
            </div>

            <div class="mb-3">
                <label for="tahun" class="form-label">Tahun</label>
                <input type="number" name="tahun" class="form-control" required min="2000" max="{{ date('Y') }}">
            </div>

            <div class="mb-3">
                <label for="jumlah_tagihan" class="form-label">Jumlah Tagihan</label>
                <input type="number" name="jumlah_tagihan" class="form-control" required step="0.01" min="0">
            </div>

            <button type="submit" class="btn btn-success">Tambah Tagihan</button>
        </form>
    </div>
@endsection
