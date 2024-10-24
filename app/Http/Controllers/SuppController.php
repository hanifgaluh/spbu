<?php

namespace App\Http\Controllers;

use App\Models\Supp;
use Illuminate\Http\Request;

class SuppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd("hai");
        // $request->validate([
        //     'nm_supp' => 'required|string|max:255',
        //     'jns_bbm' => 'required|string',
        //     'jml_bbm' => 'required|integer',
        //     'hrg_bbm' => 'required|numeric',
        //     'tgl_beli' => 'required|date',
        // ]);

        // dd($request->all()); 

        // Simpan data ke dalam database
        $supp = new Supp();
        $supp->nm_supp = $request->nm_supp;
        $supp->jns_bbm = $request->jns_bbm;
        $supp->jml_bbm = $request->jml_bbm;
        $supp->hrg_beli = $request->hrg_beli;
        $supp->hrg_total = $request->jml_bbm * $request->hrg_beli;
        $supp->tgl_beli = $request->tgl_beli;
        $supp->save();

        return redirect('/dashboard')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supp $supp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supp $supp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supp $supp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supp $supp)
    {
        //
    }
}
