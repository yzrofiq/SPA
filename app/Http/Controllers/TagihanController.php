<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagihanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer|min:2000|max:' . date('Y'),
            'jumlah_tagihan' => 'required|numeric|min:0',
        ]);
    
        // Lanjutkan untuk menyimpan data tagihan
        Tagihan::create($request->all());
    
        return redirect()->route('tagihans.index')->with('success', 'Tagihan berhasil ditambahkan.');
    }
    public function laporan(Request $request)
    {
        $query = Tagihan::query();
    
        // Filter berdasarkan bulan, tahun, atau status
        if ($request->bulan) {
            $query->where('bulan', $request->bulan);
        }
        if ($request->tahun) {
            $query->where('tahun', $request->tahun);
        }
        if ($request->status) {
            $query->where('status', $request->status);
        }
    
        $tagihans = $query->get();
    
        return view('tagihans.laporan', compact('tagihans'));
    }
}    