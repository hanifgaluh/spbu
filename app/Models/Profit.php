<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profit extends Model
{
    protected $fillable = [
        'tgl_awal',
        'tgl_akhir',
        'tot_beli',
        'tot_jual',
        'profit',
    ];
}
