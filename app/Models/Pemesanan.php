<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function bahanbakus(){

        return $this->belongsTo(Bahanbaku::class, 'bahanbaku_id');

    }

    public function transaksis(){

        return $this->hasOne(Transaksi::class);

    }
}
