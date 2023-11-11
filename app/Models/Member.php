<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = ['id','nama','alamat','no_telp'];
    protected $table = 'members';
    // protected $primaryKey = 'id';
    protected $casts = [
        'id' => 'string',
    ];

    public function Member() {
        return $this->hasMany(Member::class,'id_member','id');
    }
}
