<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $fillable = [
        'nama',
        'kode_obat',
        'mili_botol',
        'jenis',
        'satuan',
        'unit',
        'jml_unit',
        'jml_perunit',
        'ttl_obat',
        'harga_perunit',
        'harga_modal',
        'harga_jual',
        'desc',
        'order_date',
        'expired_date',
    ];

    public function setKodeObatAttribute($value)
    {	
        $this->attributes['kode_obat'] = 'AO-' . \Carbon\Carbon::now()->format('dmy') . '-' .($this->max('id')+1);
    }

    public function scopeSearchObat($query, $tgl_awal, $tgl_akhir)
    {
        return \App\Obat::whereBetween('created_at', array($tgl_awal, $tgl_akhir));
    }

    public function getOrderDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d, M Y');
    }

    public function getExpiredDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d, M Y');
    }

    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d, M Y');
    }

}
