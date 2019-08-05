<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bencana extends Model
{
	//public $timestamps = false;
    protected $table ='bencana';

     public function districts()
     {
        return $this->belongsTo(districts::class, 'lokasi_id');
     }
      

    public function regencies()
   {
   		return $this->belongsTo(regencies::class, 'lokasi_id');
   }

   public function id_Petugas()
   {
   		return $this->belongsTo(Petugas::class, 'id');
   }

   public function scopeSearch($query, $search){  
        return $query->where('nama_bencana','like','%' .$search. '%');
    }
    public function Donasi()
    {
        return $this->hasOne('App\Donasi','bencana_id');
    }
}
