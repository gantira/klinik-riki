<?php

namespace App\Http\Controllers;

use App\TransaksiObat;
use App\Obat;
use Illuminate\Http\Request;

class TransaksiObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obat = Obat::find($request->obat_id);

        if ($obat->ttl_obat >= $request->jml_obat) {

            TransaksiObat::updateOrCreate(
                        ['obat_id' => $request->obat_id, 'transaksi_id' => $request->transaksi_id],
                        [
                            'transaksi_id' => $request->transaksi_id,
                            'jml_obat' => $request->jml_obat, 
                            'harga_jual' => $obat->harga_jual,
                            'resep_obat' => $request->resep_obat,
                            'total' => $obat->harga_jual * $request->jml_obat,
                        ]);

            $obat->decrement('ttl_obat', $request->jml_obat);

        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TransaksiObat  $transaksiObat
     * @return \Illuminate\Http\Response
     */
    public function show(TransaksiObat $transaksiObat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransaksiObat  $transaksiObat
     * @return \Illuminate\Http\Response
     */
    public function edit(TransaksiObat $transaksiObat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransaksiObat  $transaksiObat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransaksiObat $transaksiObat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransaksiObat  $transaksiObat
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransaksiObat $transaksiObat)
    {
        $transaksiObat->obat()->increment('ttl_obat', $transaksiObat->jml_obat);
        $transaksiObat->delete();

        return back();
    }
}
