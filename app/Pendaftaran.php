<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $fillable = [
        'pasien_id',
        'jenis',
        'keterangan',
    ];

    public function pasien()
    {
    	return $this->belongsTo(Pasien::class);
    }

    public function diagnosa()
    {
    	return $this->belongsTo(Diagnosa::class);
    }

}
