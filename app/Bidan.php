<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidan extends Model
{
    protected $fillable = [
		'user_id',
		'kode_bidan',
		'join_date',
		'ud_um',
		'birthdate',
		'phone',
		'alamat',
		'kecamatan',
		'kota',
		'kode_pos',
    ];

    public function setKodeBidanAttribute($value)
    {	
        $this->attributes['kode_bidan'] = 'AB-' . \Carbon\Carbon::now()->format('dmy') . '-' .($this->max('id')+1);
    }
}
