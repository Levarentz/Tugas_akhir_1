<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class telepon extends Model
{
    protected $guarded = [];

    public function karyawan(){
        return $this->belongsTo(Karyawan::class,'karyawan_id','id');
    }
}
