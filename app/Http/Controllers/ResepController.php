<?php

namespace App\Http\Controllers;

use App\Resep;
use App\Transaksi;
use Illuminate\Http\Request;

class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resep.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Resep::create($request->all());

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    public function show(Resep $resep)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $resep)
    {
        $data['transaksi'] = $resep;
        $data['resep'] = Resep::whereTransaksiId($resep->id)->get();

        return view('resep.show', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resep $resep)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resep $resep)
    {
        //
    }
}
