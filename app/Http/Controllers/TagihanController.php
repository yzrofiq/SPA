<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tagihan; // Import the Tagihan model
use App\Models\Pelanggan; // Import the Pelanggan model

class TagihanController extends Controller
{
    public function index()
    {
        $tagihans = Tagihan::with('pelanggan')->get(); // Load tagihans with related pelanggan
        return view('tagihans.index', compact('tagihans'));
    }

    public function create()
    {
        // Retrieve all customers
        $pelanggans = Pelanggan::all(); // Retrieve all pelanggan
        return view('tagihans.create', compact('pelanggans')); // Ganti 'pelanggan' menjadi 'pelanggans'

    }

    public function store(Request $request)
{
    $request->validate([
        'pelanggan_id' => 'required|exists:pelanggans,id',
        'bulan' => 'required|integer|min:1|max:12',
        'tahun' => 'required|integer|min:2000|max:' . date('Y'),
        'jumlah_tagihan' => 'required|numeric|min:0',
    ]);

    // Save tagihan data
    Tagihan::create($request->only(['pelanggan_id', 'bulan', 'tahun', 'jumlah_tagihan']));

    return redirect()->route('tagihans.index')->with('success', 'Tagihan berhasil ditambahkan.');
}


    public function edit($id)
    {
        $tagihan = Tagihan::findOrFail($id);
        return view('tagihans.edit', compact('tagihan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pelanggan_id' => 'required|exists:pelanggan,id',
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer|min:2000|max:' . date('Y'),
            'jumlah_tagihan' => 'required|numeric|min:0',
        ]);

        $tagihan = Tagihan::findOrFail($id);
        $tagihan->update($request->all());

        return redirect()->route('tagihan.index')->with('success', 'Tagihan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $tagihan = Tagihan::findOrFail($id);
        $tagihan->delete();

        return redirect()->route('tagihan.index')->with('success', 'Tagihan berhasil dihapus.');
    }

    public function laporan(Request $request)
    {
        $query = Tagihan::query();

        // Filter based on bulan, tahun, or status
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
