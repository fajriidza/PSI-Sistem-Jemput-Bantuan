<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class regencies extends Model
{
    protected $fillable = ['name'];
    protected $table ='regencies';

    public function provinces()
    {
    	return $this->belongsTo(provinces::class, 'province_id');
    }
}
