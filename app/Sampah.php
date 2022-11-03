<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sampah extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['nama','harga','gambar','deskripsi','satuan','jenis_sampah'];
    
}
