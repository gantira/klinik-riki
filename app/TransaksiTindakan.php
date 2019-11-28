<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiTindakan extends Model
{
    protected $fillable = [
        'transaksi_id',
        'tindakan_id',
        'user_id',
		'total'
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }  

    public function tindakan()
    {
        return $this->belongsTo(Tindakan::class);
    }    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
