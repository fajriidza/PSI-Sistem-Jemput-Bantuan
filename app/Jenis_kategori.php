<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis_kategori extends Model
{
    protected $table ='Jenis_kategori';

 
    public function Donasi()
    {
        return $this->hasOne('App\Donasi','jenis_donasi');
    }
    public function kategori()
    {
    	return $this->belongsTo(Categori::class, 'id_categoris');
    }


}
