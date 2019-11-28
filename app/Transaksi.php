<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'kode_transaksi',
        'jenis',
        'pasien_id',
        'user_id',
        'diagnosa_id',
        'status',
        'tambahan_diagnosa',
        'dp',
    ];

    public function setKodeTransaksiAttribute($value)
    {	
        $this->attributes['kode_transaksi'] = 'TR-' . \Carbon\Carbon::now()->format('dmy') . '-' .($this->max('id')+1);
    }

    public function transaksiObat()
    {
        return $this->hasMany(TransaksiObat::class);
    }

    public function transaksiTindakan()
    {
        return $this->hasMany(TransaksiTindakan::class);
    }

    public function transaksiKamar()
    {
        return $this->hasMany(TransaksiKamar::class);
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

    public function resep()
    {
        return $this->hasMany(Resep::class);
    }

    public function scopeSearch($query, $q)
    {
        return $query->whereHas('pasien', function($query) use ($q) {
            return $query->where('kode_pasien', 'like', '%'.$q.'%')
                        ->orWhere('nama', 'like', '%'.$q.'%');
        });
    }

    public function scopeSearchTransaksi($query, $tgl_awal, $tgl_akhir)
    {
        return \App\Transaksi::whereBetween('created_at', array($tgl_awal, $tgl_akhir));
    }

    public function getStatusAttribute($value)
    {
        return $value == 'paid' ? 'Dibayar' : 'Belum Bayar';
    }

    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->formatLocalized('%d %B %Y');
    }


}
