<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Tagihan;
use App\Models\Pelanggan; // Import the Pelanggan model


class PembayaranController extends Controller
{
    public function index()
    {
        // Retrieve all payments with pagination
        $pembayarans = Pembayaran::paginate(10); // Adjust the number per page as needed
        return view('pembayarans.index', compact('pembayarans'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::all(); // Ambil semua pelanggan
        $tagihans = Tagihan::all(); // Ambil semua tagihan
        return view('pembayarans.create', compact('pelanggans', 'tagihans'));
    }
    

    public function store(Request $request)
{
    // Validate request data
    $request->validate([
        'pelanggan_id' => 'required|exists:pelanggans,id',
        'tagihan_id' => 'required|exists:tagihans,id',
        'tanggal_pembayaran' => 'required|date',
        'jumlah_bayar' => 'required|numeric',
    ]);

    // Save payment
    Pembayaran::create([
        'pelanggan_id' => $request->pelanggan_id,
        'tagihan_id' => $request->tagihan_id,
        'tanggal_pembayaran' => $request->tanggal_pembayaran,
        'jumlah_bayar' => $request->jumlah_bayar,
    ]);

    // Update the tagihan status to paid
    $tagihan = Tagihan::find($request->tagihan_id);
    $tagihan->status = 1; // Assuming 1 means paid
    $tagihan->save();

    return redirect()->route('pembayarans.index')->with('success', 'Pembayaran berhasil');
}

}

