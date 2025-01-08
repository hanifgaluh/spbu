<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DtlJual extends Model
{
    protected $fillable = ['qty_dtl_jual','id_jual','kd_bbm'];
    public function transaksi()
        {
            return $this->belongsTo(Transaksi::class);
        }
}


