<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestSetor extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['warga_id','sampah_id','tanggal_pengambilan'];
    public function warga(){
        return $this->hasOne(User::class,'id', 'warga_id');
    }
    public function sampah(){
        return $this->hasMany(Sampah::class,'id', 'sampah_id');
    }
}
