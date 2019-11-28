<?php

namespace App\Http\Controllers;

use App\Pendaftaran;
use App\Pasien;
use App\Diagnosa;
use DB;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pendaftaran'] = Pendaftaran::all();
        $data['diagnosa'] = Diagnosa::pluck('nama', 'id');
        $data['pasien'] = Pasien::select(DB::raw('CONCAT(kode_pasien, " | ", nama, " | ", umur , " | ", jk) AS nama'), 'id')->pluck('nama', 'id');
        $data['pasien_perempuan'] = Pasien::select(DB::raw('CONCAT(kode_pasien, " | ", nama, " | ", umur , " | ", jk) AS nama'), 'id')->whereJk('Perempuan')->pluck('nama', 'id');

        return view('pendaftaran.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pendaftaran::updateOrCreate(
                        ['pasien_id' => $request->pasien_id],
                        [
                            'jenis' => $request->jenis,
                            'keterangan' => $request->keterangan, 
                        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendaftaran $pendaftaran)
    {
        //
    }
}
