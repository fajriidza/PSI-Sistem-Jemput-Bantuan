<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class districts extends Model
{
     protected $fillable = ['id','regency_id'];
    protected $table ='districts';

    public function regencies()
    {
    	return $this->belongsTo(regencies::class, 'regency_id');
    }
}
