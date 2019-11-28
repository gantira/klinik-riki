<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dashboard;
use App\TransaksiTindakan;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['jumlah_tindakan'] = TransaksiTindakan::select('tindakan_id', DB::raw('count(*) as total'))
                 ->groupBy('tindakan_id')
                 ->pluck('total');

        $data['label_tindakan'] = TransaksiTindakan::groupBy('tindakan_id')->get()->each(function ($item, $key) {                                        return $item['nama'] = $item->tindakan->nama;
                                    })->pluck('nama');

        return view('dashboard.index', $data);
    }
}
