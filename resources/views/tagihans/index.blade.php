@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Tagihan</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Pelanggan</th>
                    <th>Bulan</th>
                    <th>Tahun</th>
                    <th>Jumlah Tagihan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tagihans as $tagihan)
                    <tr>
                        <td>{{ $tagihan->pelanggan->nama }}</td>
                        <td>{{ $tagihan->bulan }}</td>
                        <td>{{ $tagihan->tahun }}</td>
                        <td>Rp {{ number_format($tagihan->jumlah_tagihan, 2) }}</td>
                        <td>{{ $tagihan->status ? 'Lunas' : 'Belum Bayar' }}</td>
                        <td>
                            <a href="{{ route('pembayarans.create', ['tagihan_id' => $tagihan->id]) }}" class="btn btn-primary btn-sm">Bayar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
