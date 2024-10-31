<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
{
    $pelanggans = Pelanggan::all();
    return view('pelanggans.index', compact('pelanggans'));
}

public function show($id)
{
    $pelanggan = Pelanggan::findOrFail($id);
    $tagihans = $pelanggan->tagihans; // Menampilkan semua tagihan terkait pelanggan
    return view('pelanggans.show', compact('pelanggan', 'tagihans'));
}

}
