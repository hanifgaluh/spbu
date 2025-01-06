<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'nm_pel',
        'id_pel',
        'hrg_beli',
        'jml_bbm',
        'jns_bbm',
        'hrg_total',
        'tgl_beli'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
