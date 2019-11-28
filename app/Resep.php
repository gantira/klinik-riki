<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    protected $fillable = [
        'transaksi_id',
        'nama',
        'jml',
        'jenis',
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}



