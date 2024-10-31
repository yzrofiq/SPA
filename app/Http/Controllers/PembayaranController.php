<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Tagihan;
class PembayaranController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'tagihan_id' => 'required|exists:tagihans,id',
            'tanggal_pembayaran' => 'required|date',
            'jumlah_bayar' => 'required|numeric',
        ]);
    
        // Simpan pembayaran
        Pembayaran::create([
            'tagihan_id' => $request->tagihan_id,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'jumlah_bayar' => $request->jumlah_bayar,
        ]);
    
        // Update status tagihan menjadi lunas
        $tagihan = Tagihan::find($request->tagihan_id);
        $tagihan->status = 1;
        $tagihan->save();
    
        return redirect()->route('tagihans.index')->with('success', 'Pembayaran berhasil');
    }
    
}
