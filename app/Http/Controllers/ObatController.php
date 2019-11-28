<?php

namespace App\Http\Controllers;

use App\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['obat'] = Obat::all();

        return view('obat.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('obat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Obat::create($request->all());

        return redirect()->route('obat.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function edit(Obat $obat)
    {
        $data['obat'] = $obat;

        return view('obat.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obat $obat)
    {
        $obat->update($request->except('kode_obat'));
        
        return redirect()->route('obat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obat $obat)
    {
        $obat->delete();

        return redirect()->route('obat.index');
    }

    public function addstockobat()
    {
        $data['obat'] = Obat::pluck('nama', 'id');

        return view('obat.addstockobat', $data);
    }

    public function storeaddstockobat(Request $request)
    {
        $obat = Obat::find($request->obat_id);
        $obat->fill($request->except('kode_obat'));
        Obat::create($obat->toArray());

        // $obat->ttl_obat = $obat->ttl_obat + $request->ttl_obat;
        // $obat->save();

        return redirect()->route('obat.index');
    }
}
