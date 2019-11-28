<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiObat extends Model
{
    protected $fillable = [
        'transaksi_id',
        'obat_id',
        'jml_obat',
        'harga_jual',
		'total'
    ];

    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }    

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
