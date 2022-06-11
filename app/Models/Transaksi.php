<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function bahanbakus(){

        return $this->belongsTo(Bahanbaku::class);

    }

    public function pemesanans(){

        return $this->hasOne(Pemesanan::class);

    }
}
