<?php

namespace App\Http\Controllers;

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
        return view('dashboard.sparepart.index', [
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
        return view('dashboard.sparepart.create', [
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
        return view('dashboard.sparepart.show', [
            'sparepart' => $sparepart
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
        return view('dashboard.sparepart.edit', [
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
}
