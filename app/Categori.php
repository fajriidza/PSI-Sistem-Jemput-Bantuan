<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categori extends Model
{
    protected $fillable = ['id','kategori_nama'];
    protected $table ='categoris';

    public function jenis_kategori()
    {
    	return $this->hasOne(Jenis_kategori::class);
    }

}
