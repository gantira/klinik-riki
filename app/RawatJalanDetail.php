<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RawatJalanDetail extends Model
{
    protected $fillable = [
        'rawat_jalan_id',
        'obat_id',
        'jml_obat',
        'harga_jual',
		'total'
    ];

    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }    

    public function rawatjalan()
    {
        return $this->belongsTo(RawatJalan::class);
    }
}
