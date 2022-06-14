<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemakaian extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function spareparts(){
        return $this->belongsTo(Sparepart::class, 'sparepart_id');
    }

    public function transaksis(){
        return $this->hasMany(Transaksi::class, 'pemakaian_id');
    }
    
}
