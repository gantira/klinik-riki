<?php

namespace App\Http\Controllers;

use App\TransaksiKamar;
use App\Kamar;
use Illuminate\Http\Request;

class TransaksiKamarController extends Controller
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
        $kamar = Kamar::find($request->kamar_id);

        if ($kamar->jml_kamar >= 1) {

            TransaksiKamar::updateOrCreate(
                        ['kamar_id' => $request->kamar_id, 'transaksi_id' => $request->transaksi_id],
                        [
                            'lama_inap' => $request->lama_inap,
                            'total' => $kamar->harga,
                        ]);

            $kamar->decrement('jml_kamar', 1);

        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TransaksiKamar  $transaksiKamar
     * @return \Illuminate\Http\Response
     */
    public function show(TransaksiKamar $transaksiKamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransaksiKamar  $transaksiKamar
     * @return \Illuminate\Http\Response
     */
    public function edit(TransaksiKamar $transaksiKamar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransaksiKamar  $transaksiKamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransaksiKamar $transaksiKamar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransaksiKamar  $transaksiKamar
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransaksiKamar $transaksiKamar)
    {
        $transaksiKamar->kamar()->increment('jml_kamar', 1);
        $transaksiKamar->delete();

        return back();
    }
}
