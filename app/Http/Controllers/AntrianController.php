<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pendaftaran;
use App\Diagnosa;
use App\Pasien;
use App\Tindakan;
use App\User;
use App\Transaksi;
use DB;

class AntrianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pendaftaran'] = Pendaftaran::where('jenis', auth()->user()->dokter->spesialisasi)->get();

        return view('antrian.index', $data);
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
        $transaksi = Transaksi::create($request->all());
        Pendaftaran::find($request->pendaftaran)->delete();

        return redirect()->route('transaksi.edit', $transaksi->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['pendaftaran'] = Pendaftaran::find($id);
        $data['diagnosa'] = Pendaftaran::find($id)->jenis == 'Umum' ? Diagnosa::whereNotIn('kategori', ['Bersalin'])->pluck('nama', 'id') : Diagnosa::whereNotIn('kategori', ['Umum'])->pluck('nama', 'id');
        $data['dokter'] = User::role('dokter')->whereId(Pendaftaran::find($id)->jenis == 'Umum' ? 3 : 2)->pluck('name', 'id');

        return view('antrian.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $data['pasien'] = Pendaftaran::find($id);

        return view('antrian.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
