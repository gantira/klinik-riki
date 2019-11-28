<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alkes extends Model
{
    protected $fillable = [
        'nama',
        'kode_alkes',
        'type',
        'unit',
        'jml_unit',
        'jml_perunit',
        'ttl_alat',
        'harga_perunit',
        'harga_modal',
        'harga_jual',
        'desc',
        'order_date',
    ];

    public function setKodeAlkesAttribute($value)
    {   
        $this->attributes['kode_alkes'] = 'AK-' . \Carbon\Carbon::now()->format('dmy') . '-' .($this->max('id')+1);
    }
}
