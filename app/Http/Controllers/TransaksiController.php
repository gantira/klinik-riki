<?php

namespace App\Http\Controllers;

use App\Pasien;
use App\Diagnosa;
use App\Dokter;
use App\User;
use App\Obat;
use App\Transaksi;
use App\TransaksiKamar;
use App\Tindakan;
use App\Kamar;
use DB;
use Illuminate\Http\Request;

class TransaksiController extends Controller
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
        Transaksi::create($request->all());

        return redirect()->route('transaksi.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi, $id)
    {
        $data['pasien'] = Pasien::find($id);
        $data['dokter'] = User::role('dokter')->pluck('name', 'id');
        $data['diagnosa'] = Diagnosa::pluck('nama', 'id');
        
        return view('transaksi.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {   
        if ($transaksi->jenis == 'Umum') {
            $data['dokter'] = User::role(['dokter', 'bidan'])->whereNotIn('id', ['2'])->pluck('name', 'id');
        }else {
            $data['dokter'] = User::role(['dokter', 'bidan'])->whereNotIn('id', ['3'])->pluck('name', 'id');
        }
        $data['diagnosa'] = $transaksi->jenis == 'Umum' ? Diagnosa::whereNotIn('kategori', ['Bersalin'])->pluck('nama', 'id') : Diagnosa::whereNotIn('kategori', ['Umum'])->pluck('nama', 'id');
        $data['transaksi'] = $transaksi;
        $data['obat'] = Obat::select(DB::raw('CONCAT(nama, " [stok: ", ttl_obat, " ", jenis, "]") AS nama'), 'id')->pluck('nama', 'id');
        $data['kamar'] = Kamar::select(DB::raw('CONCAT(nama, " [available: ", jml_kamar, "]") AS nama'), 'id')->pluck('nama', 'id');
        $data['tindakan'] = $transaksi->jenis == 'Umum' ? Tindakan::whereNotIn('kategori', ['Bersalin'])->pluck('nama', 'id') : Tindakan::whereNotIn('kategori', ['Umum'])->pluck('nama', 'id');

        return view('transaksi.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $transaksi->update($request->all());

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        return back();
    }

    public function paid(Transaksi $transaksi)
    {
        $transaksi->update(['status'=>'Paid']);

        if ($transaksi->jenis == 'Bersalin') {
            TransaksiKamar::whereTransaksiId($transaksi->id)->first()->kamar()->increment('jml_kamar', 1);
        }

        return back();
    }
}
