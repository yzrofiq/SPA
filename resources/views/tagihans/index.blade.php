@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Tagihan</h1>
        
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('tagihans.create') }}" class="btn btn-primary mb-3">Tambah Tagihan</a>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pelanggan</th>
                    <th>Bulan</th>
                    <th>Tahun</th>
                    <th>Jumlah Tagihan</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($tagihans as $tagihan)
                <tr>
                    <td>{{ $tagihan->id }}</td>
                    <td>{{ $tagihan->pelanggan->name ?? 'Pelanggan tidak ditemukan' }}</td> <!-- Assuming pelanggan relationship exists -->
                    <td>{{ $tagihan->bulan }}</td>
                    <td>{{ $tagihan->tahun }}</td>
                    <td>{{ number_format($tagihan->jumlah_tagihan, 2, ',', '.') }} IDR</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada tagihan yang ditemukan.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
