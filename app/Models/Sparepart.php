<?php

namespace App\Models;

use DB;

use App\Models\Kategori;
use App\Models\Bahanbaku;
use App\Models\Pemakaian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB as FacadesDB;

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

    public function pemakaians(){
        return $this->hasMany(Pemakaian::class, 'sparepart_id');
    }    

    public function scopeDropdownWithKategori($query)
    {
        return $query->leftJoin('kategoris', 'kategoris.id', '=', 'kategori_id')
            ->select('spareparts.id', FacadesDB::raw('concat(kategoris.nama, " - ", spareparts.nama) as nama'))
            ->pluck('nama', 'spareparts.id');
    }

}
