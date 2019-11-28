<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\Pasien;
use App\Setting;
use Illuminate\Http\Request;

class RujukanController extends Controller
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
        $data['setting'] = Setting::find(1);

        return view('rujukan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['rujukan'] = $request->body;

        return view('rujukan.print', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rujukan  $rujukan
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $rujukan)
    {
        $data['transaksi'] = $rujukan;

        return view('rujukan.print', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rujukan  $rujukan
     * @return \Illuminate\Http\Response
     */
    public function edit(Rujukan $rujukan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rujukan  $rujukan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rujukan $rujukan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rujukan  $rujukan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rujukan $rujukan)
    {
        //
    }
}
