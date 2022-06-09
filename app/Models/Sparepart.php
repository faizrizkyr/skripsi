<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kategori(){

        return $this->belongsTo(Kategori::class);

    }

    public function bahanbakus(){

        return $this->belongsToMany(Bahanbaku::class, 'bahanbaku_spareparts', 'sparepart_id', 'bahanbaku_id')->withPivot('jumlah');

    }


}
