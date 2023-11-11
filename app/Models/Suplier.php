<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    use HasFactory;
    protected $fillable = ['nama','nama_perusahaan','alamat','no_telp'];
    protected $table = 'supliers';
    public function Suplier() {
        return $this->hasMany(Suplier::class,'id_suplier','id');
    }
}
