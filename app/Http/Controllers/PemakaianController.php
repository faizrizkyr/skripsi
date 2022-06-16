<?php

namespace App\Http\Controllers;

use App\Models\Pemakaian;
use App\Models\Sparepart;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class PemakaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pemakaian.index', [
            'pemakaians' => Pemakaian::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pemakaian.create', [
            'sparepart_id' => Sparepart::pluck('nama', 'id')
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
            'tgl_pemakaian' => 'required|date',
            'sparepart_id' => 'required',
            'jumlah' => 'required'
        ]);
        
        $pemakaian = Pemakaian::create($validatedData);
        $sparepart = Sparepart::find($request->sparepart_id);
        foreach ($sparepart->bahanbakus as $bahanbaku) {
            $transaksipemakaian = Transaksi::create([
                'bahanbaku_id' => $bahanbaku->id,
                'jumlah' => $request->jumlah*$bahanbaku->pivot->jumlah,
                'tgl_transaksi' => $request->tgl_pemakaian,
                'jenis_transaksi' => 'Pemakaian',
                'pemakaian_id' => $pemakaian->id
                
            ]);
        }

        return redirect('/admin/pemakaian')->with('success', 'Data Pemakaian Bahan Baku di berhasil tambah.');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemakaian  $pemakaian
     * @return \Illuminate\Http\Response
     */
    public function show(Pemakaian $pemakaian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemakaian  $pemakaian
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemakaian $pemakaian)
    {
        return view('admin.pemakaian.edit', [
            'pemakaian' => $pemakaian,
            'sparepart_id' => Sparepart::pluck('nama', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemakaian  $pemakaian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemakaian $pemakaian)
    {
        $validatedData = $request->validate([
            'tgl_pemakaian' => 'required|date',
            'sparepart_id' => 'required',
            'jumlah' => 'required'
        ]);
        
        Pemakaian::where('id', $pemakaian->id)->update($validatedData);
        
        $transaksipemakaian = Transaksi::where('pemakaian_id', $pemakaian->id)->get();
        foreach ($transaksipemakaian as $transaksi) {
            $transaksi->delete();
        }
        
        $sparepart = Sparepart::find($request->sparepart_id);
        foreach ($sparepart->bahanbakus as $bahanbaku) {
            $transaksipemakaian = Transaksi::create([
                'bahanbaku_id' => $bahanbaku->id,
                'jumlah' => $request->jumlah*$bahanbaku->pivot->jumlah,
                'tgl_transaksi' => $request->tgl_pemakaian,
                'jenis_transaksi' => 'Pemakaian',
                'pemakaian_id' => $pemakaian->id
                
            ]);
        }
        return redirect('/admin/pemakaian')->with('success', 'Data Pemakaian Bahan Baku di berhasil tambah.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemakaian  $pemakaian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemakaian $pemakaian)
    {
        Pemakaian::destroy($pemakaian->id);

        return redirect('/admin/pemakaian')->with('success', 'Data pemakaian sparepart berhasil di hapus.');
    }
}
