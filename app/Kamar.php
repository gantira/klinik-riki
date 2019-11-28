<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $fillable = [
        'kode_kamar',
        'nama',
        'jml_kamar',
        'harga',
    ];

    public function setKodeKamarAttribute($value)
    {	
        $this->attributes['kode_kamar'] = 'AK-' . \Carbon\Carbon::now()->format('dmy') . '-' .($this->max('id')+1);
    }
}
