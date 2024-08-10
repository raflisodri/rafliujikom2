<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;
    protected $table = 'detail_transaksi';
    protected $fillable = ['id_transaksi', 'id_sepatu', 'harga_satuan', 'jumlah', 'total'];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }
    public function sepatu()
    {
        return $this->belongsTo(Sepatu::class, 'id_sepatu');
    }
}
