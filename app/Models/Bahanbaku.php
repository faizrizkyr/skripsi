<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahanbaku extends Model
{
    use HasFactory;

    protected $fillable = ['nama','deskripsi','harga','min_stok'];

    protected function bahanbaku_spareparts(){

        return $this->hasMany(BahanbakuSparepart::class);
        
    }

}
