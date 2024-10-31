@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Pelanggan</h1>
        <a href="{{ route('pelanggans.create') }}" class="btn btn-primary mb-3">Tambah Pelanggan</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Nomor Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pelanggans as $pelanggan)
                    <tr>
                        <td>{{ $pelanggan->nama }}</td>
                        <td>{{ $pelanggan->alamat }}</td>
                        <td>{{ $pelanggan->nomor_telepon }}</td>
                        <td>
                            <a href="{{ route('pelanggans.show', $pelanggan->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('pelanggans.edit', $pelanggan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('pelanggans.destroy', $pelanggan->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
