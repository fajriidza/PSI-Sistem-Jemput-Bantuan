<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Bencana;
use App\Categori;
use App\User;
use App\Donasi;
use DB;

class HomeController extends Controller
{
    public function index()
    {

        $bencana = DB::table('bencana')->orderBy('bencana.id','desc')->get();
        $totalDonatur = User::count();
        $totalDonasi = Donasi::all()->where('status','Telah Dijemput')->count();
        $totalTerdistribusi = Donasi::where('status','Terdistribusi')->count();
        $total = $totalTerdistribusi + $totalDonasi;
        return view('User.homePage',compact('bencana','totalDonatur','totalDonasi','totalTerdistribusi','total'));
    }
    public function daftarbencana()
    {
        $bencana = DB::table('bencana')->orderBy('bencana.id','desc')->get();
        return view('User.daftarBencana',compact('bencana'));
    }
    public function detailbencana($id)
    {
        $bencana = Bencana::find($id);
        return view('User.detailBencana',compact('bencana'));
    }
    

}
