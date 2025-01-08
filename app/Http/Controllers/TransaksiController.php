<?php

namespace App\Http\Controllers;

use App\Models\Bbm;
use App\Models\Dtl_jual;
use App\Models\DtlJual;
use App\Models\Profit;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TransaksiController extends Controller
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
        $bbm = Bbm::all();
        $validated = $request->validate([
            'nm_pel' => 'required',
            'tgl_beli' => 'required',
            'email_pel' => 'required',
            'kd_bbm' => 'required',
            'telp_pel' => 'required',
            'tot_jual' => 'required',
            'qty_dtl_jual' => 'required',
            'kd_bbm' => 'required',


        ]);

        Log::info('Validated data: ', $validated);


        $user = User::create([
            'nm_pel' => $validated["nm_pel"],
            'email_pel' => $validated["email_pel"],
            'telp_pel' => $validated['telp_pel'],
        ]);

        Log::info('User created: ', $user->toArray());


        $latestUser = User::latest()->first();
        $transaction = Transaksi::create([
            'id_pel' => $latestUser->id_pel, // Jika tabel `contacts` punya relasi ke `users`
            'tgl_beli' => $validated['tgl_beli'],
            'tot_jual' => $validated['tot_jual'],
        ]);


        Log::info('Transaction created: ', $transaction->toArray());

        $latestJual = Transaksi::latest()->first();
        $qty_bbm = DtlJual::create([
            'qty_dtl_jual' => $validated['qty_dtl_jual'],
            'id_jual' => $latestJual->id_jual,
            'kd_bbm' => $validated['kd_bbm'],
        ]);
        
        Log::info('Dtl_jual created: ', $qty_bbm->toArray());
        
        $kodeBbm = Bbm::where('kd_bbm', $validated['kd_bbm'])->first();

        if (!$kodeBbm) {
            return redirect()->back()->withErrors('Kode BBM tidak ditemukan!');
        }

        $tot_beli = $kodeBbm->hrg_beli * $validated['qty_dtl_jual'];
        $profit = $validated['tot_jual'] - $tot_beli;

        $profitDb = Profit::create([
            'tot_beli' => $tot_beli,
            'tot_jual' => $validated['tot_jual'],
            'profit' => $profit
        ]);

        Log::info('Profit created: ', $profitDb->toArray());






        return redirect('/dashboard')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
