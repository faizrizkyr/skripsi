<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eoq extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function bahanbaku(){
        return $this->belongsTo(Bahanbaku::class, 'bahanbaku_id');
    }
}
