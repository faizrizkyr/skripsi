<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function bahanbakus(){

        return $this->belongsTo(Bahanbaku::class, 'bahanbaku_id');

    }

    public function pemesanans(){

        return $this->belongsTo(Pemesanan::class, 'pemesanan_id');

    }

    public function pemakaians(){

        return $this->belongsTo(Pemakaian::class, 'pemakaian_id');

    }
}
