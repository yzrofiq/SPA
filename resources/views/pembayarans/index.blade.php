@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Pembayaran</h1>
        
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <a href="{{ route('pembayarans.create') }}" class="btn btn-primary mb-3">Tambah Pembayaran</a>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tagihan</th>
                    <th>Jumlah Bayar</th>
                    <th>Tanggal Pembayaran</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($pembayarans as $pembayaran)
                <tr>
                    <td>{{ $pembayaran->id }}</td>
                    <td>
                        @if($pembayaran->tagihan)
                            {{ $pembayaran->tagihan->id }} <!-- Assuming this is correct -->
                        @else
                            <span class="text-danger">Tagihan tidak ditemukan</span>
                        @endif
                    </td>
                    <td>{{ number_format($pembayaran->jumlah_bayar, 2, ',', '.') }} IDR</td> <!-- Added currency unit -->
                    <td>{{ \Carbon\Carbon::parse($pembayaran->tanggal_pembayaran)->format('d-m-Y') }}</td> <!-- Ensure it's a Carbon instance -->
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada pembayaran yang ditemukan.</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        {{ $pembayarans->links() }}
    </div>
@endsection
