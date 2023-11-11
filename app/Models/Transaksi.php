<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = ['id_user','id_member','id_sepatu','tanggal','jumlah','total'];
    protected $table = 'transaksis';

    public function User() {
        return $this->belongsTo(User::class,'id_user','id');
    }
    public function Member() {
        return $this->belongsTo(Member::class,'id_member','id');
    }
    public function Sepatu () {
        return $this->belongsTo(Sepatu::class,'id_sepatu','id');
    } 
}
