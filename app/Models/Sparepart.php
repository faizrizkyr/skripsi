<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kategoris(){

        return $this->belongsTo(Kategori::class);

    }


}
