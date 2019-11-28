<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    protected $fillable = [
		'nama',
		'desc',
		'kategori',
    ];
}
