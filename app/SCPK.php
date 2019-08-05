<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SCPK extends Model
{
	protected $table ='kurir';
    public GetKurir(){
    	$kurir = SCPK::all();

    	return $kurir;
    }
}
