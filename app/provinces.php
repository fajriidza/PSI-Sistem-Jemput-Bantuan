<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class provinces extends Model
{
    protected $fillable = ['name'];
    protected $table ='provinces';

    public function regency()
    {
    	return $this->hasOne(regencies::class);
    }
}
