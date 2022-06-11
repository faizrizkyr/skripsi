<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahanbaku extends Model
{
    use HasFactory;

    // protected $fillable = ['nama','deskripsi','harga','min_stok'];
    protected $guarded = ['id'];

    // protected function bahanbaku_spareparts(){

    //     return $this->hasMany(BahanbakuSparepart::class);
        
    // }

    public function spareparts(){

        return $this->belongsToMany(Sparepart::class, 'bahanbaku_spareparts', 'bahanbaku_id', 'sparepart_id')->withPivot('jumlah');

    }

    public function pemesanans()
    {
        return $this->belongsTo(Pemesanan::class);
    }

    public function transaksis(){

        return $this->hasMany(Transaksi::class);

    }

}
