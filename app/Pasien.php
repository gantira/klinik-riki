<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $fillable = [
        'kode_pasien',
        'nama',
        'umur',
        'jk',
        'phone',
        'kelurahan',
        'kota',
        'kode_pos',
        'tgl_lahir',
        'peng_jawab',
    ];

    public function setKodePasienAttribute($value)
    {	
        $this->attributes['kode_pasien'] = 'AP-' . \Carbon\Carbon::now()->format('dmy') . '-' .($this->max('id')+1);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function rekamedis()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function getTglLahirAttribute($value)
    {
        return \Carbon\Carbon::createFromDate(\Carbon\Carbon::parse($value)->year, \Carbon\Carbon::parse($value)->month, \Carbon\Carbon::parse($value)->day)->diff(\Carbon\Carbon::now())->format('%y tahun, %m bulan dan %d hari');
    }


}

