<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supp extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'kd_bbm';
    protected $keyType = 'string';

    protected $fillable = [
        'nm_supp',
        'hrg_beli',
        'jml_bbm',
        'jns_bbm',
        'hrg_total',
        'tgl_beli'
    ];


}
