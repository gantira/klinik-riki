<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiKamar extends Model
{
    protected $fillable = [
        'transaksi_id',
        'kamar_id',
        'lama_inap',
        'total',
    ];

    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }    

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
