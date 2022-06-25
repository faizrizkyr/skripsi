<?php

namespace App\Http\Controllers;

use App\Models\Bahanbaku;
use App\Models\Eoq;
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
    public function hitung(Request $request)
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
        $tgl_awal = date('d F Y', strtotime("$request->tahun-1-1") );
        $interval[0] = $tgl_awal;
        // $tgl_awal = date('d F Y', strtotime($tgl_awal . " +$T days"));
// dd($tgl_awal);
        for ($i=0; $i < $frekuensi; $i++) { 
            $tgl_awal = date('d F Y', strtotime($tgl_awal . " +$T days"));
            
            $interval[$i]=$tgl_awal;
        }
        // dd($eoq, $frekuensi, $T);

        
        return view('admin.eoq.results', [
            'tahun' => $request->tahun,
            'bahanbaku' => Bahanbaku::findOrFail($request->bahanbaku_id),
            'holding_cost' => $request->holding_cost,
            'jml_kebutuhan' => $d,
            'biaya_order' => $s,
            'eoq' => $eoq,
            'frekuensi' => $frekuensi,
            'interval' => $T,
            'tglInterval' => $interval
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tahun' => 'required',
            'bahanbaku_id' => 'required',
            'holding_cost' => 'required',
            'jml_kebutuhan' => 'required',
            'biaya_order' => 'required',
            'eoq' => 'required',
            'frekuensi_order' => 'required',
            'interval_order' => 'required'
        ]);

        Eoq::updateOrCreate(['bahanbaku_id' => $request->bahanbaku_id, 'tahun' => $request->tahun], $validatedData);

        return redirect('/admin/bahanbaku/'. $request->bahanbaku_id)->with('success', ' Berhasil menghitung EOQ.');

    }


}
