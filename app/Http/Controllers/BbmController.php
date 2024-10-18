<?php

namespace App\Http\Controllers;

use App\Models\Bbm;
use Illuminate\Http\Request;

class BbmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bbms = Bbm::all();
        return view('bbm.index', compact('bbms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bbm.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kd_bbm' => 'required',
            'nm_bbm' => 'required',
            'hrg_jual' => 'required',
        ]);
        $bbm = new Bbm();
        $bbm->kd_bbm = $request->kd_bbm;
        $bbm->nm_bbm = $request->nm_bbm;
        $bbm->hrg_jual = $request->hrg_jual;
        $bbm->save();
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bbm $bbm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($kd_bbm)
    {
        $bbm = Bbm::where('kd_bbm', $kd_bbm)->firstOrFail();
        return view('bbm.edit', compact('bbm'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $kd_bbm)
    {
        // Validasi input dari form
        $request->validate([
            'nm_bbm' => 'required',
            'hrg_jual' => 'required',
        ]);
    
        // Cari data bbm berdasarkan kd_bbm
        $bbm = Bbm::where('kd_bbm', $kd_bbm)->firstOrFail();
    
        // Update data dengan input dari form
        $bbm->kd_bbm = $request->kd_bbm;
        $bbm->nm_bbm = $request->nm_bbm;
        $bbm->hrg_jual = $request->hrg_jual;
        
        // Simpan perubahan ke database
        $bbm->save();
        //dd('Data berhasil disimpan!'); 
    
        // Redirect setelah update
        return redirect('/dashboard')->with('success', 'Data BBM berhasil diupdate!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bbm $bbm)
    {
        Bbm::destroy($bbm->kd_bbm);
        
        return redirect('/dashboard');
    }
}
