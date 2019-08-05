<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\provinces;
use App\regencies;
use App\districts;

class LokasiController extends Controller
{
    public function selectAjax(Request $request)
    {
        if($request->ajax()){
            $regencies = DB::table('regencies')->where('province_id',$request->id_province)->pluck("name","id")->all();
            $districts = DB::table('districts')->where('regency_id',$request->id_regencies)->pluck("name","id")->all();
            $data = view('ajax-select',compact('regencies','districts'))->render();
            return response()->json(['options'=>$data]);
        }
    }
}
