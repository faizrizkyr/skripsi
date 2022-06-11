<?php

namespace App\Http\Controllers;

use App\Models\Bahanbaku;
use App\Models\Pemesanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pemesanan.index', [
            'pemesanans' => Pemesanan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pemesanan.create', [
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
            'tgl_pemesanan' => 'required|date',
            'bahanbaku_id' => 'required',
            'jumlah' => 'required'
        ]);


        $pemesanan = Pemesanan::create($validatedData);
        $transaksipemesanan = Transaksi::create([
            'bahanbaku_id' => $request->bahanbaku_id,
            'jumlah' => $request->jumlah,
            'tgl_transaksi' => $request->tgl_pemesanan,
            'jenis_transaksi' => 'Pemesanan',
            'pemesanan_id' => $pemesanan->id
            
        ]);

        return redirect('/admin/pemesanan')->with('success', 'Data Pemesanan Bahan Baku di berhasil tambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemesanan $pemesanan)
    {
        return view('admin.pemesanan.show', [
            'pemesanan' => $pemesanan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemesanan $pemesanan)
    {
        return view('admin.pemesanan.edit', [
            'pemesanan' => $pemesanan,
            'bahanbaku_id' => Bahanbaku::pluck('nama', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemesanan $pemesanan)
    {
        $validatedData = $request->validate([
            'tgl_pemesanan' => 'required|date',
            'bahanbaku_id' => 'required',
            'jumlah' => 'required'
        ]);

        Pemesanan::where('id', $pemesanan->id)->update($validatedData);

        $transaksipemesanan = Transaksi::where('pemesanan_id', $pemesanan->id)->firstOrfail();

        $transaksipemesanan->tgl_transaksi = $request->tgl_pemesanan; 
        $transaksipemesanan->bahanbaku_id = $request->bahanbaku_id; 
        $transaksipemesanan->jumlah = $request->jumlah;
        $transaksipemesanan->save();

        return redirect('/admin/pemesanan')->with('success', 'Data berhasil di-update.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemesanan $pemesanan)
    {
        Pemesanan::destroy($pemesanan->id);

        return redirect('/admin/pemesanan')->with('success', 'Data pemesanan berhasil di hapus.');
    }
}
