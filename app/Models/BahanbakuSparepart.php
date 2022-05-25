<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanbakuSparepart extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function spareparts(){

        return $this->belongsTo(Sparepart::class);

    }

    public function bahanbakus(){
        return $this->belongsTo(Bahanbaku::class);
    }
}
