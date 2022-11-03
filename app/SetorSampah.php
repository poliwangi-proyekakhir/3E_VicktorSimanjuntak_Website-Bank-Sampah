<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SetorSampah extends Model
{
    //
    protected $fillable = ['warga_id','request_id', 'jumlah_setor','kuantitas_sampah','method'];

    public function warga(){
        return $this->hasOne(User::class,'id', 'warga_id');
    }
    public function requestSetor(){
        return $this->hasOne(RequestSetor::class,'id', 'request_id');
    }
}
