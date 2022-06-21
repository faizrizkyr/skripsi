<?php

namespace App\Http\Controllers;

use App\Models\Bahanbaku;
use App\Models\Pemakaian;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class BahanbakuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.bahanbaku.index', [
            'bahanbakus' => Bahanbaku::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bahanbaku.create');
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
            'nama' => 'required|max:20',
            'deskripsi' => 'required|max:50',
            'harga' => 'required'
        ]);


        Bahanbaku::create($validatedData);

        return redirect('/admin/bahanbaku')->with('success', 'Data Bahan Baku di berhasil tambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Bahanbaku $bahanbaku)
    {
        return view('admin.bahanbaku.show', [
            'bahanbaku' => $bahanbaku
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Bahanbaku $bahanbaku)
    {
        return view('admin.bahanbaku.edit', [
            'bahanbaku' => $bahanbaku
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bahanbaku $bahanbaku)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:20',
            'deskripsi' => 'required|max:50',
            'harga' => 'required'
        ]);

        Bahanbaku::where('id', $bahanbaku->id)->update($validatedData);

        return redirect('/admin/bahanbaku')->with('success', 'Data berhasil di-update.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bahanbaku $bahanbaku)
    {
        Bahanbaku::destroy($bahanbaku->id);

        return redirect('/admin/bahanbaku')->with('success', 'Post has been deleted.');
    }

    public function holding_cost($id)
    {
        $hc = 0.15;
        $bahanbaku = Bahanbaku::findOrFail($id);
        $biayapenyimpanan = $hc * $bahanbaku->harga;

        return response()->json([
            'status' => true,
            'data' => $biayapenyimpanan,
            'message' => 'Berhasil mengambil data'
        ]);
        // dd($biayapenyimpanan);
    }

    public function jumlah_kebutuhan(request $request, $id)
    {
        $tahun = $request->tahun - 1;
        $pemakaian = Transaksi::where('bahanbaku_id', $id)->where('jenis_transaksi', 'Pemakaian')->whereYear('tgl_transaksi', $tahun)->get();
        
        return response()->json([
            'status' => true,
            'data' => $pemakaian->sum('jumlah'),
            'message' => 'Berhasil mengambil data'
        ]);
    }
}
