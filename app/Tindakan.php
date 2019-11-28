<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tindakan extends Model
{
    protected $fillable = [
        'nama',
        'kode_tindakan',
        'fee_dokter',
        'fee_karyawan',
        'harga',
        'desc',
        'kategori',
    ];

    public function setKodeTindakanAttribute($value)
    {   
        $this->attributes['kode_tindakan'] = 'AT-' . \Carbon\Carbon::now()->format('dmy') . '-' .($this->max('id')+1);
    }
}


