<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien;
use App\Transaksi;

class RekamedisController extends Controller
{
	public function index(Request $request)
	{
		$data['rekamedis'] = Transaksi::search($request->q)->get();

		return view('rekamedis.index', $data);
	}

    public function show($id)
    {
    	$data['rekamedis'] = Pasien::find($id);

    	return view('rekamedis.show', $data);
    }
}
