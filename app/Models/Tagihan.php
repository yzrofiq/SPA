<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;
    public function pelanggan()
{
    return $this->belongsTo(Pelanggan::class);
}

public function pembayarans()
{
    return $this->hasMany(Pembayaran::class);
}

}
