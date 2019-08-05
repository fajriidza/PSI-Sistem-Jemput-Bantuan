<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Categori;
use App\Bencana;
use App\Donasi;
use App\User;
use App\Jenis_kategori;
use DB;

class DonasiController extends Controller
{
    public function donasiSekarang()
    {
        $id = Auth::user()->id;
    	$categoris = DB::table('categoris')->pluck("kategori_nama","id")->all();
        $jenis_kategoris = Jenis_kategori::all();
        $donatur = User::find($id);
    	return view('User.formdonasi',compact('categoris','donatur','jenis_kategoris'));
    }
    public function donasibencana($id)
    {
      
        $categoris = DB::table('categoris')->pluck("kategori_nama","id")->all();
        $jenis_kategoris = Jenis_kategori::all();
        $id_donatur = Auth::user()->id;
        $donatur = User::find($id_donatur);
        $bencana = Bencana::find($id);
        return view('User.formdonasiBencana',compact('bencana','categoris','donatur'));
    }
    public function storeDonasi(Request $request)
    {
        $donasi = new Donasi;
        $donasi->kode_donasi = date("dmY").rand(1000,9999);
        $donasi->pemilik_id = $request->pemilik_id;
        $donasi->bencana_id = $request->bencana_id;
        $donasi->jenis_donasi = $request->id_jenis_donasi;
        $donasi->jumlah_donasi = $request->jumlah_donasi;
        $donasi->lokasi_id = $request->lokasi_id;
        $donasi->deskripsi_donasi = $request->deskripsi_donasi;
        $donasi->status = $request->status;
        $donasi->latitude = $request->lat;
        $donasi->longitude = $request->lng;
        $donasi->save();

        session()->flash('notif','Terima Kasih Telah berdonasi');
        return redirect('/donatur/donasi');


    }
    public function selectAjax(Request $request)
    {

        if($request->ajax()){
            $jenis_kategoris = DB::table('jenis_kategori')->where('id_categoris','=',$request->id_categoris)->pluck("jenis_kategori","id");
            $data = view('User.jenis_kategori',compact('jenis_kategoris'))->render();
            return response()->json(['options'=>$data]);
        }
    }
}
