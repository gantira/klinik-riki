<?php

namespace App\Http\Controllers;

use App\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['kamar'] = Kamar::all();

        return view('kamar.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kamar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Kamar::create($request->all());

        return redirect()->route('kamar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function show(Kamar $kamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function edit(Kamar $kamar)
    {
        $data['kamar'] = $kamar;

        return view('kamar.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kamar $kamar)
    {
        $kamar->update($request->except('kode_kamar'));
        
        return redirect()->route('kamar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kamar $kamar)
    {
        $kamar->delete();

        return redirect()->route('kamar.index');
    }

    public function addstockkamar()
    {
        $data['kamar'] = Kamar::pluck('nama', 'id');

        return view('kamar.addstockkamar', $data);
    }

    public function storeaddstockkamar(Request $request)
    {
        $kamar = Kamar::find($request->kamar_id);
        $kamar->fill($request->except('ttl_kamar'));
        $kamar->ttl_kamar = $kamar->ttl_kamar + $request->ttl_kamar;
        $kamar->save();

        return redirect()->route('kamar.index');
    }
}
