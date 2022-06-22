<?php

namespace App\Models;

use App\Models\Eoq;
use App\Models\Pemesanan;
use App\Models\Sparepart;
use App\Models\Transaksi;
use App\Models\BahanbakuSparepart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        return $this->hasMany(Pemesanan::class, 'bahanbaku_id');
    }

    public function transaksis(){

        return $this->hasMany(Transaksi::class, 'bahanbaku_id');

    }

    public function eoq()
    {
        return $this->hasOne(Eoq::class, 'bahanbaku_id')->orderBy('tahun', 'desc');
    }

}
