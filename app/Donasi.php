<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    protected $table ='donasi';
    protected $fillable = ['id','kode_donasi','pemilik_id','bencana_id','nama_donasi','jenis_donasi','jumlah_donasi','lokasi_id','deskripsi_donasi','status'];

    public function get_dataUser()
   {
   		return $this->belongsTo(User::class,'pemilik_id');
   }
     public function get_dataBencana()
   {
      return $this->belongsTo(Bencana::class,'bencana_id');
   }


   /*public function scopeSearch($query, $search){
        return $query->where('kode_donasi','like','%' .$search. '%')->orWhere('nama_donasi','like','%' .$search. '%');
    }*/

    public function scopeFilterTotal($query, $search){

        return $query->whereYear('donasi.updated_at','=',date($search));
    }

    public function scopeFilterKategori($query, $search){
      return $query->where('jenis_kategori.id_categoris','=',$search);
    }

    public function get_lokasi()
   {
      return $this->belongsTo(districts::class, 'lokasi_id');
   }
   public function get_tujuanDonasi()
   {
      return $this->belongsTo(districts::class, 'lokasi_id');
   }
    public function get_jenisDonasi()
   {
      return $this->belongsTo(Jenis_kategori::class, 'jenis_donasi');
   }
   public function get_kurir()
   {
      return $this->belongsTo(Kurir::class, 'kurir_id');
   }

}
