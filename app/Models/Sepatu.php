<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sepatu extends Model
{
    use HasFactory;
    protected $fillable = ['id_suplier','nama','merk','jenis','stok','ukuran','warna','harga'];
    protected $table = 'sepatus';
    public function Suplier() {
        return $this->belongsTo(Suplier::class,'id_suplier','id');
    }
    public function Sepatu () {
        return $this->hasMany(Sepatu::class,'id_sepatu','id');
    }
}
