<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $fillable = [
		'user_id',
		'kode_dokter',
		'join_date',
		'ud_um',
		'birthdate',
		'phone',
		'spesialisasi',
		'alamat',
		'kecamatan',
		'kota',
		'kode_pos',
    ];

    public function setKodeDokterAttribute($value)
    {	
        $this->attributes['kode_dokter'] = 'AD-' . \Carbon\Carbon::now()->format('dmy') . '-' .($this->max('id')+1);
    }

}