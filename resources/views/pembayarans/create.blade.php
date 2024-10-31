@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bayar Tagihan</h1>
        <form action="{{ route('pembayarans.store') }}" method="POST">
            @csrf
            <input type="hidden" name="tagihan_id" value="{{ request('tagihan_id') }}">
            <div class="mb-3">
                <label for="tanggal_pembayaran" class="form-label">Tanggal Pembayaran</label>
                <input type="date" name="tanggal_pembayaran" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="jumlah_bayar" class="form-label">Jumlah Bayar</label>
                <input type="number" name="jumlah_bayar" class="form-control" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-success">Bayar</button>
        </form>
    </div>
@endsection
