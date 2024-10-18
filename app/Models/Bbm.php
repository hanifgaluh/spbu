<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bbm extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'kd_bbm';
    protected $keyType = 'string';

    protected $fillable = ['nm_bbm', 'hrg_jual'];

}
