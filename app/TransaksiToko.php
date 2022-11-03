<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiToko extends Model
{
    //
    protected $fillable = ['warga_id', 'produk_id', 'kuantitas_produk', 'total'];
    
    public function warga(){
        return $this->hasOne(User::class,'id', 'warga_id');
    }
    public function produk(){
        return $this->hasOne(Produk::class,'id', 'produk_id');
    }

    
}
