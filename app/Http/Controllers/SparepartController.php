<?php

namespace App\Http\Controllers;

use App\Models\Bahanbaku;
use App\Models\BahanbakuSparepart;
use App\Models\Kategori;
use App\Models\Sparepart;
use Illuminate\Http\Request;

class SparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sparepart.index', [
            'spareparts' => Sparepart::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sparepart.create', [
            'kategori' => Kategori::pluck('nama', 'id')
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
            'nama' => 'required|max:20',
            'deskripsi' => 'required|max:50',
            'kategori_id' => 'required'
        ]);


        Sparepart::create($validatedData);

        return redirect('/admin/sparepart')->with('success', 'Data Bahan Baku di berhasil tambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sparepart $sparepart)
    {
        $bahanbakus = $sparepart->bahanbakus;
        // dd($bahanbakus->toArray());
        return view('admin.sparepart.show', [
            'sparepart' => $sparepart,
            'bahanbakus' => $bahanbakus
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sparepart $sparepart)
    {
        return view('admin.sparepart.edit', [
            'sparepart' => $sparepart,
            'kategori' => Kategori::pluck('nama', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sparepart $sparepart)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:20',
            'deskripsi' => 'required|max:50',
            'kategori_id' => 'required'
        ]);

        Sparepart::where('id', $sparepart->id)->update($validatedData);

        return redirect('/admin/sparepart')->with('success', 'Data berhasil di-update.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sparepart $sparepart)
    {
        Sparepart::destroy($sparepart->id);

        return redirect('/admin/sparepart')->with('success', 'Post has been deleted.');
    }

    public function createBahanbaku(Request $request, Sparepart $sparepart)
    {
        
        return view('admin.sparepart.bahanbaku.create', [
            'sparepart' => $sparepart,
            'bahanbaku' => Bahanbaku::pluck('nama', 'id')
        ]);
    }

    public function storeBahanbaku(Request $request, Sparepart $sparepart)
    {
        $validatedData = $request->validate([
            'bahanbaku_id' => 'required',
            'jumlah' => 'required'
        ]);
        
        $bahanbakusparepart = BahanbakuSparepart::create([
            'sparepart_id' => $sparepart->id,
            'bahanbaku_id' => $request->bahanbaku_id,
            'jumlah' => $request->jumlah
        ]) ;

        return redirect('/admin/sparepart/' . $sparepart->id)->with('success', 'Data Bahan Baku di berhasil tambah.');
    }

    public function editBahanbaku(Request $request, Sparepart $sparepart, Bahanbaku $bahanbaku)
    {
        $bahanbakusparepart = BahanbakuSparepart::where('sparepart_id', $sparepart->id)->where('bahanbaku_id', $bahanbaku->id)->firstOrfail();

        return view('admin.sparepart.bahanbaku.edit', [
            'sparepart' => $sparepart,
            'bahanbaku' => Bahanbaku::pluck('nama', 'id'),
            'bahanbakusparepart' => $bahanbakusparepart
        ]);


    }

    public function updateBahanbaku(Request $request, Sparepart $sparepart, Bahanbaku $bahanbaku)
    {
        $bahanbakusparepart = BahanbakuSparepart::where('sparepart_id', $sparepart->id)->where('bahanbaku_id', $bahanbaku->id)->firstOrfail();

        $validatedData = $request->validate([
            'bahanbaku_id' => 'required',
            'jumlah' => 'required'
        ]);

        $bahanbakusparepart->bahanbaku_id = $request->bahanbaku_id; 
        $bahanbakusparepart->jumlah = $request->jumlah;
        $bahanbakusparepart->save();

        return redirect('/admin/sparepart/' . $sparepart->id)->with('success', 'Data Bahan Baku berhasil di update.');
    }

    public function destroyBahanbaku(Request $request, Sparepart $sparepart, Bahanbaku $bahanbaku)
    {
        $bahanbakusparepart = BahanbakuSparepart::where('sparepart_id', $sparepart->id)->where('bahanbaku_id', $bahanbaku->id)->firstOrfail();

        $bahanbakusparepart->delete();

        return redirect('/admin/sparepart/' . $sparepart->id)->with('success', 'Data Bahan Baku berhasil di hapus.');
    }
}
