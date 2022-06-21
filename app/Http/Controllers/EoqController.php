<?php

namespace App\Http\Controllers;

use App\Models\Bahanbaku;
use Illuminate\Http\Request;

class EoqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.eoq.index', [
            'bahanbaku_id' => Bahanbaku::pluck('nama', 'id')
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tahun' => 'required',
            'bahanbaku_id' => 'required',
            'holding_cost' => 'required',
            'jml_kebutuhan' => 'required',
            'biaya_order' => 'required'
        ]);

        $d = $request->jml_kebutuhan;
        $s = $request->biaya_order;
        $hC = $request->holding_cost;

        $first = 2 * $d * $s;
        $second = $first/$hC;
        $eoq = round(sqrt($second));

        $frekuensi = round($d/$eoq);

        $T = round(269/$frekuensi);
        dd($eoq, $frekuensi, $T);
    }


}
