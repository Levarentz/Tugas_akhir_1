<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $guarded = [];

    public function telepon(){
        return $this->hasOne(Telepon::class,'karyawan_id','id'); 
    }

    public function bagian(){
        return $this->belongsTo(Bagian::class, 'bagian_id','id');
    }
}
