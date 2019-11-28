<?php

namespace App\Http\Controllers;

use App\Alkes;
use Illuminate\Http\Request;

class AlkesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['alkes'] = Alkes::all();

        return view('alkes.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alkes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Alkes::create($request->all());

        return redirect()->route('alkes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alkes  $alke
     * @return \Illuminate\Http\Response
     */
    public function show(Alkes $alke)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alkes  $alke
     * @return \Illuminate\Http\Response
     */
    public function edit(Alkes $alke)
    {
        $data['alkes'] = $alke;

        return view('alkes.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alkes  $alke
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alkes $alke)
    {
        $alke->update($request->except('kode_alkes'));
        
        return redirect()->route('alkes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alkes  $alke
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alkes $alke)
    {
        $alke->delete();

        return redirect()->route('alkes.index');
    }

    public function addstockalkes()
    {
        $data['alkes'] = Alkes::pluck('nama', 'id');

        return view('alkes.addstockalkes', $data);
    }

    public function storeaddstockalkes(Request $request)
    {
        $alkes = Alkes::find($request->alkes_id);
        $alkes->fill($request->except('ttl_alat'));
        $alkes->ttl_alat = $alkes->ttl_alat + $request->ttl_alat;
        $alkes->save();

        return redirect()->route('alkes.index');
    }
}
