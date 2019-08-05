<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input as input;
use App\User;
use App\regencies;
use App\provinces;
use App\districts;
use App\Donasi;
use App\Categori;
use DB;
use Hash;
use Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        return view('User.dashboarduser',compact('user_id'));
    }
    public function showFormDonasi()
    {
        return view('donasi');
    }

    public function editProfil($id)
    {
        $donatur = User::find($id);
        $provinces = $provinces = DB::table('provinces')->where('id',34)->get();
        $regencie = DB::table('regencies')->pluck("name","id")->all();
        $districts = districts::all();
        $kabupaten=DB::table('regencies')->where('province_id',$donatur->get_lokasi_user->regencies->provinces['id'])->pluck("name","id")->all();
        $kecamatan=DB::table('districts')->where('regency_id',$donatur->get_lokasi_user->regencies['id'])->pluck("name","id")->all();
        return view('User.editProfil',compact('donatur','kecamatan','districts','regencies','provinces','kabupaten'));
    }
    public function updateProfil(Request $request)
    {
                $id = $request->donatur_id;
                $donatur = DB::table('users')->where('id',$id);
                $donatur->update([
                'name' => request('nama_donatur'),
                'no_hp' => request('no_hp'),
                'alamat' => request('alamat_donatur'),
                'lokasi_id' => request('id_districts'),
                'email' => request('email_donatur')
                ]);

            return redirect('/');

    }

    public function riwayatDonasi($id)
    {  
       
        $kategori = Categori::all();
         $id_donatur = Auth::user()->id;
        $donatur = User::find($id_donatur);
        $districts = districts::all();
        $donasi = Donasi::where('pemilik_id',$id)->get();
        return view('User.riwayatDonasi',compact('donasi','kategori','donatur','districts'));
    }
}
