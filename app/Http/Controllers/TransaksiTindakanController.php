<?php

namespace App\Http\Controllers;

use App\Tindakan;
use App\TransaksiTindakan;
use Illuminate\Http\Request;

class TransaksiTindakanController extends Controller
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
        $tindakan = Tindakan::find($request->tindakan_id);

        TransaksiTindakan::updateOrCreate(
                        ['tindakan_id' => $request->tindakan_id, 'transaksi_id' => $request->transaksi_id],
                        [
                            'tindakan_id' => $request->tindakan_id,
                            'jenis' => $request->jenis,
                            'user_id' => $request->user_id,
                            'total' => $tindakan->harga,
                        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TransaksiTindakan  $transaksiTindakan
     * @return \Illuminate\Http\Response
     */
    public function show(TransaksiTindakan $transaksiTindakan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransaksiTindakan  $transaksiTindakan
     * @return \Illuminate\Http\Response
     */
    public function edit(TransaksiTindakan $transaksiTindakan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransaksiTindakan  $transaksiTindakan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransaksiTindakan $transaksiTindakan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransaksiTindakan  $transaksiTindakan
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransaksiTindakan $transaksiTindakan)
    {
        //
    }
}
