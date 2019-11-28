<?php

namespace App\Http\Controllers;

use App\Diagnosa;
use Illuminate\Http\Request;

class DiagnosaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['diagnosa'] = Diagnosa::all();

        return view('diagnosa.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('diagnosa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Diagnosa::create($request->all());

        return redirect()->route('diagnosa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Diagnosa  $diagnosa
     * @return \Illuminate\Http\Response
     */
    public function show(Diagnosa $diagnosa)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Diagnosa  $diagnosa
     * @return \Illuminate\Http\Response
     */
    public function edit(Diagnosa $diagnosa)
    {
        $data['diagnosa'] = $diagnosa;

        return view('diagnosa.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Diagnosa  $diagnosa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diagnosa $diagnosa)
    {
        $diagnosa->update($request->all());

        return redirect()->route('diagnosa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Diagnosa  $diagnosa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diagnosa $diagnosa)
    {
        $diagnosa->delete();

        return redirect()->route('diagnosa.index');
    }
}
