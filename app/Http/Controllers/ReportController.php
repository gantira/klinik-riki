<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Obat;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function show($id)
    {
    	$data['transaksi'] = Transaksi::find($id);

    	return view('report.show', $data);
    }

    public function resepobat($id)
    {
        $data['transaksi'] = Transaksi::find($id);
        
        return view('report.resepobat', $data);
    }

    public function cetakTransaksi(Request $request)
    {
        $data['transaksi'] = Transaksi::searchTransaksi($request->tgl_awal, $request->tgl_akhir)->get();
        $data['periode'] = Carbon::parse($request->tgl_awal)->formatLocalized('%d %B %Y') . ' - ' . Carbon::parse($request->tgl_akhir)->formatLocalized('%d %B %Y');

        return view('report.transaksi', $data);
    }

    public function cetakObat(Request $request)
    {
    	$data['obat'] = Obat::searchObat($request->tgl_awal, $request->tgl_akhir)->get();
        $data['periode'] = Carbon::parse($request->tgl_awal)->formatLocalized('%d %B %Y') . ' - ' . Carbon::parse($request->tgl_akhir)->formatLocalized('%d %B %Y');

        return view('report.obat', $data);
    }
}
