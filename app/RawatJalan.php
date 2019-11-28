<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RawatJalan extends Model
{
    protected $fillable = [
        'kode_rawatjalan',
        'pasien_id',
        'user_id',
        'diagnosa_id',
        'status',
    ];

    public function setKodeRawatJalanAttribute($value)
    {	
        $this->attributes['kode_rawatjalan'] = 'RJ-' . \Carbon\Carbon::now()->format('dmy') . '-' .($this->max('id')+1);
    }

    public function rawatjalandetail()
    {
        return $this->hasMany(RawatJalanDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function diagnosa()
    {
        return $this->belongsTo(Diagnosa::class);
    }

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }


}
