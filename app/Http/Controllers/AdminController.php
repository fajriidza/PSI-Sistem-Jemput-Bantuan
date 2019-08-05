<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Admin;
use App\provinces;
use App\districts;
use App\Categori;
use App\regencies;
use App\Bencana;
use App\Donasi;
use App\User;
use App\Kurir;
use App\SCPK;
use DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('Admin.dPetugas');
    }
    public function bencana(Request $request)
    {
       $adminlokasi = Auth::guard('admin')->user()->lokasi;
        $bencana = Bencana::with('regencies','districts')->orderBy('bencana.id','desc')->paginate(20);
        //$regencies = DB::table('regencies')->pluck("name","id")->all();
         $provinces = provinces::with('regency')->orderBy('provinces.name')->pluck("name","id")->all();
         $regencies = regencies::with('provinces')->where('id','=',$adminlokasi)->first();
         $districts = districts::with('regencies')->where('regency_id','=',$adminlokasi)->get();

        return view('Admin.infBencana',compact('regencies','provinces','districts','bencana'));
    }

     public function store(Request $request)
    {

        
        $this->validate($request, [

        'gambar' => 'required',
        'gambar.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:$i_bBawah48'

    ]);
      function generateRandomString($length = 10) {
      $characters = '01234$j_bBawah6789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
  }
      if($request->hasfile('gambar'))
       {

        $image=  $request->file('gambar');

              $name=generateRandomString().'.'.$image->getClientOriginalExtension();
              $image->move(public_path().'/img/bencana/', $name);
              $data = $name;

       }
       $bencana= new Bencana();
    
            $bencana->nama_bencana = $request->NamaBencana;
            $bencana->lokasi_id = $request->kecamatan;
            $bencana->deskripsi_bencana = $request->deskripsi_bencana;
            $bencana->waktu_berakhir = $request->waktu_berakhir;
            $bencana->admin_id = Auth::guard('admin')->user()->id;
            $bencana->gambar = $data;
            $bencana->save();
        
        return redirect()->to('/admin/bencana')->with('alert','Berhasil !!');
        
    }
    public function verifikasi(Request $request)
     {
          $adminlokasi = Auth::guard('admin')->user()->lokasi;
    //     $lokasi = DB::table()
    //     $id_pemilik = DB::table('users')->join('districts', 'users.lokasi_id','=','districts. id')->where('regencies.province.id',$adminlokasi);
         //$donasi = DB::table('donasi')->where('donasi.status','Menunggu')->paginate($i_bBawah);;
           $donasi = Donasi::with('get_tujuanDonasi','get_dataUser','get_jenisDonasi')->select('donasi.id as id_donasi','donasi.*','users.*','districts.*')->join('users', 'donasi.pemilik_id','=','users.id')
                                        ->join('districts','districts.id','=','users.lokasi_id')
                                        ->where('districts.regency_id','=',$adminlokasi)->where('donasi.status','Menunggu')->get();

        return view('Admin.verifDonasi',compact('donasi'));

    }
    public function verifikasiDonasi($id)
    {
        //$id = $request->donasi_id;
        $donasi = DB::table('donasi')->where('id',$id);
        $donasi->update([
            'status' => request('status')

        ]);
        return redirect('/admin/verifikasi');

    }

    public function editVerifikasi($id)
    {
        $bencana= Bencana::all();
        $donasi = Donasi::findOrFail($id);
        
        return view('Admin.editVerif',compact('donasi','bencana'));
    }
    public function simpanVerifikasi($id, Request $request)
    {
        $donasi = DB::table('donasi')->where('id',$id);
        $lokasi = DB::table('bencana')->select('lokasi_id')->where('id',request('id_bencana'))->get();
        
         $donasi->update([
            'bencana_id' => request('id_bencana'),
            'lokasi_id'  => $lokasi[0]->lokasi_id

        ]);
        return redirect('/admin/verifikasi');
    }

    public function jemput(Request $request)
    {
        $search = $request->input('search');


        $adminlokasi = Auth::guard('admin')->user()->lokasi;
        $donasi = Donasi::with('get_tujuanDonasi','get_dataUser','get_jenisDonasi')
                                        ->select('donasi.id as id_donasi','donasi.*','users.*','districts.*','jenis_kategori.*')
                                        ->join('users', 'donasi.pemilik_id','=','users.id')
                                        ->join('districts','districts.id','=','users.lokasi_id')
                                        ->join('jenis_kategori', 'donasi.jenis_donasi','=','jenis_kategori.id')
                                        ->where('districts.regency_id','=',$adminlokasi)
                                        ->where('donasi.status','Komitmen')
                                        ->orWhere('donasi.status','Siap Jemput')
                                        ->get();
        $variablejarak = DB::table('pakar')->where('id','=',1)->get();
        $variableItem = DB::table('pakar')->where('id','=',2)->get();
        $j_bAtas = $variablejarak[0]->batas_atas;
        $j_bBawah = $variablejarak[0]->batas_bawah;
        $i_bAtas = $variableItem[0]->batas_atas;
        $i_bBawah = $variableItem[0]->batas_bawah;

         foreach ($donasi as $donasis => $d) {
      //   $donasis;# code...
            $total_item = $d->jumlah_donasi * $d->nilai_item;
            $jarak = $d->jarak;
          
            $jd = ($j_bAtas-$jarak)/($j_bAtas-$j_bBawah); //jarak dekat
            $jj = ($jarak-$j_bBawah)/($j_bAtas-$j_bBawah); // jarak jauh
            $is = ($i_bAtas-$total_item)/($i_bAtas-$i_bBawah); //item sedikit
            $ib = ($total_item-$i_bBawah)/($i_bAtas-$i_bBawah); //item banyak

            //ATURAN 1 IF jarak dekat and nilai item banyak then rekomendasi tinggi

            //miu jarak dekat 
            if($jarak>$j_bBawah && $jarak<$j_bAtas){
              $Ujarak1 = $jd; 
            }
            else if($jarak<=$j_bBawah){
              $Ujarak1 = 1;
            }
            else{
              $Ujarak1=0;
            }
            //miu nilai item banyak 
            if($total_item>$i_bBawah && $total_item<$i_bAtas){
              $Unilai1 = $ib;
            }
            else if( $total_item<=$i_bBawah){
              $Unilai1 = 0;
            }
            else{
              $Unilai1 = 1;
            }

            if($Ujarak1<$Unilai1){
              $a1 = $Ujarak1;
            }
            else{
              $a1=$Unilai1;
            }

            $z1=$a1*100;

            //ATURAN 2 IF jarak jauh and nilai item sedikit then rekomendasi rendah

            //mui jarak jauh
            if($jarak>$j_bBawah && $jarak<$j_bAtas){
              $Ujarak2 = $jj;
            }
            else if($jarak<=$j_bBawah){
              $Ujarak2 = 0;
            }
            else{
              $Ujarak2 = 1;
            }
            //mui nilai item sedikit
            if($total_item>$i_bBawah && $total_item<$i_bAtas){
              $Unilai2 = $is;
            }
            else if($total_item<=$i_bBawah){
              $Unilai2 = 1;
            }
            else{
              $Unilai2 = 0;
            }

            if($Ujarak2<$Unilai2){
              $a2 = $Ujarak2;
            }
            else{
              $a2=$Unilai2;
            }
            $z2=100-($a2*100);


           //ATURAN 3 IF jarak dekat and nilai item sedikit then rekomendasi rendah
           
           //mui jarak dekat
            if($jarak>$j_bBawah && $jarak<$j_bAtas){
              $Ujarak3 = $jd;
            }
            else if($jarak <=$j_bBawah){
              $Ujarak3 = 1;
            }
            else{
              $Ujarak3=0;
            }

            //mui nilai item sedikit
            if($total_item>$i_bBawah && $total_item<$i_bAtas){
              $Unilai3= $is;
            }
            else if($total_item<=$i_bBawah){
              $Unilai3=1;
            }
            else{
              $Unilai3=0;
            }


            if($Ujarak3<$Unilai3){
              $a3 = $Ujarak3;
            }
            else{
              $a3=$Unilai3;
            }
            $z3=100-($a3*100);

            //ATURAN 4 IF jarak jauh and nilai item banyak then rekomendasi tinggi

            //mui jarak jauh
            if($jarak>$j_bBawah && $jarak<$j_bAtas){
              $Ujarak4=$jj;
            }
            else if($jarak<=$j_bBawah){
              $Ujarak4=0;
            }
            else{
              $Ujarak4=1;
            }

            if($total_item>$i_bBawah && $total_item<$i_bAtas){
              $Unilai4=$ib;
            }
            else if($total_item<=$i_bBawah){
              $Unilai4=0;
            }
            else{
              $Unilai4=1;
            }


            if($Ujarak4<$Unilai4){
              $a4 = $Ujarak4;
            }
            else{
              $a4=$Unilai4;
            }
            $z4=$a4*100;

            $Ztotal[] = (($a1*$z1)+($a2*$z2)+($a3*$z3)+($a4*$z4))/($a1+$a2+$a3+$a4);

            if($Ztotal<=50){
              $rekomendasi[] = "Motor";
            }
            else{
              $rekomendasi[] = "Mobil";
            }
        }

        return view('Admin.jBantuan',compact('donasi','rekomendasi','Ztotal'));
    }
    
    public function editJemput($id)
    {
       $adminlokasi = Auth::guard('admin')->user()->lokasi;
        $donasi = Donasi::with('get_tujuanDonasi','get_dataUser','get_jenisDonasi')->findOrFail($id);
        $kurir = Kurir::where('kurir.lokasi_tugas','=',$adminlokasi)->get();
        
        return view('Admin.editJadwal',compact('donasi','kurir'));

    }

    public function atur_jadwal(Request $request, $id)
    {
       
        $donasi = Donasi::with('get_tujuanDonasi','get_dataUser','get_jenisDonasi')->find($id);
        $donasi->jadwal_jemput = $request->jadwal;
        $donasi->waktu_jemput = $request->waktu;
        $donasi->status = $request->status;
        $donasi->lokasi_gudang = Auth::guard('admin')->user()->lokasi;
        $donasi->save();
        
        return redirect('/admin/jemput');
    }

   


    public function dataDonatur()
    {
        $adminlokasi = Auth::guard('admin')->user()->lokasi;
        $donasi = Donasi::with('get_tujuanDonasi','get_dataUser','get_jenisDonasi')->select('donasi.id as id_donasi','donasi.*','users.*','districts.*')->join('users', 'donasi.pemilik_id','=','users.id')
                                        ->join('districts','districts.id','=','users.lokasi_id')
                                        ->where('districts.regency_id','=',$adminlokasi)->get();

        return view('Admin.dDonatur',compact('donasi'));
    }
    public function detaildataDonatur($id)
    {
        $donasi= Donasi::find($id);

        return view('Admin.detailDonatur',compact('donasi'));
    }

    public function gudang(Request $request)
    {
      $adminlokasi = Auth::guard('admin')->user()->lokasi;
        $donasi = Donasi::with('get_tujuanDonasi','get_dataUser','get_jenisDonasi')->select('donasi.id as id_donasi','donasi.*','users.*','districts.*')->join('users', 'donasi.pemilik_id','=','users.id')
                                        ->join('districts','districts.id','=','users.lokasi_id')
                                        ->where('districts.regency_id','=',$adminlokasi)->where('donasi.status','Telah Dijemput')->get();

        return view('Admin.gudang',compact('donasi'));
    }
    public function distribusiDonasi($id)
    {
        //$id = $request->donasi_id;
        $donasi = DB::table('donasi')->where('id',$id);
        $donasi->update([
            'status' => request('status')

        ]);
        return redirect('/admin/gudang');

    }

    public function editBencana($id)
    {

        $adminlokasi = Auth::guard('admin')->user()->lokasi;
        //$regencies = DB::table('regencies')->pluck("name","id")->all();

        $bencana = Bencana::findOrFail($id);
        $regencies = regencies::where('id','=',$adminlokasi)->first();
        //$kabupaten=DB::table('regencies')->where('province_id',$bencana->regencies->provinces['id'])->pluck("name","id")->all();
        $districts = districts::with('regencies')->where('regency_id','=',$adminlokasi)->get();
        return view('Admin.editInfBencana', compact('provinces','regencies','bencana','districts'));

    }
     public function destroyBencana(Request $request)
    {
            $bencana = Bencana::findOrFail($request->bencanaIdDelete);
            $bencana->delete();
            return redirect('/admin/bencana');

    }

    public function updateBencana(Request $request, $id)
    {

        $this->validate($request, [


        'gambar.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:$i_bBawah48'

            ]);
              function generateRandomString($length = 10) {
              $characters = '01234$j_bBawah6789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
              $charactersLength = strlen($characters);
              $randomString = '';
              for ($i = 0; $i < $length; $i++) {
                  $randomString .= $characters[rand(0, $charactersLength - 1)];
              }
              return $randomString;
          }
      if($request->hasfile('gambar'))
       {

            $image=  $request->file('gambar');

              $name=generateRandomString().'.'.$image->getClientOriginalExtension();
              $image->move(public_path().'/img/bencana/', $name);
              $data = $name;

       }
        $bencana = Bencana::find($id);
        $bencana->nama_bencana = $request->nama_bencana;
        $bencana->deskripsi_bencana = $request->deskripsi;
        $bencana->waktu_berakhir = $request->waktu_berakhir;
        $bencana->lokasi_id = $request->kecamatan;
        if($request->hasfile('gambar')){
            $bencana->gambar = $data;
        }
        $bencana->save();

        return redirect('admin/bencana');
    }

    public function showKurir()
    {
        $kurir = Kurir::all();

        return view('Admin.kelolakurir',compact('kurir'));

    }
    public function storekurir(Request $request)
    {
        $kurir = new Kurir();
        $kurir->nama = $request->nama;
        $kurir->alamat = $request->alamat;
        $kurir->no_hp = $request->hp;
        $kurir->lokasi_tugas = $request->lokasi_tugas;
        $kurir->save();

        return redirect('/admin/kurir');

    }
     public function updateKurir(Request $request)
    {
        
            $id = $request->kurirId;
            $kurir= DB::table('kurir')->where('id',$id);
            $kurir->update([
            'nama' => request('nama'),
            'alamat' => request('alamat'),
            'no_hp' => request('hp')
            //'lokasi_tugas' => request('lokasi_tugas')
       
            ]);
        

        return redirect('/admin/kurir');
    }
     public function destroykurir(Request $request)
    {

            $kurir = Kurir::findOrFail($request->petugasIdDelete);
            $kurir->delete();
            return redirect('/admin/kurir');

    }

    public function autoBencana(Request $request)
    {/*

         if($request->ajax()){
            $bencana = DB::table('bencana')->where('id',$request->nama_bencana)->pluck("nama_bencana","id")->all();
            $deskripsi = $bencana->deskripsi ;
            return response()->json($deskripsi);
        }

        /*
         if($request->get('query'))
         {
          $query = $request->get('query');
          $data = DB::table('bencana')
            ->where('nama_bencana', 'LIKE', "%{$query}%")
            ->get();
          $output = '<ul class="dropdown-menu form-control" style="display:block; position:relative">';
          foreach($data as $row)
          {
           $output .= '
           <div class="form-control">
           <li><a href="#">'.$row->nama_bencana.'</a></li>
           </div>
           ';
          }
          $output .= '</ul>';
          echo $output;
         }*/
    }

    public function statistik(Request $request)
    {
        
        $search = $request->input('filter');
        $adminlokasi = Auth::guard('admin')->user()->lokasi;
        $lokasi_kabupaten = DB::table('regencies')->where('id','=',$adminlokasi)->first();
        $donasi = DB::table('donasi')->get();
        if(is_null($search)){
        $time = "di Semua Tahun";
        $daerah_jemput = Donasi::select('districts.name',DB::raw('count(districts.id) as total'))
                                      ->join('users', 'donasi.pemilik_id','=','users.id')
                                      ->join('districts','districts.id','=','users.lokasi_id')
                                      ->where('districts.regency_id','=',$adminlokasi)
                                      ->where('donasi.status','=','Telah Dijemput')
                                      //->filterTotal($search)
                                      ->groupBy('districts.name')
                                      ->orderBy('total','desc')->get()->toArray();
        $nama = array_column($daerah_jemput,'name');
        $total = array_column($daerah_jemput,'total');

        $donasi_populer = Donasi::select('jenis_kategori.jenis_kategori as nama',DB::raw('COUNT(donasi.jenis_donasi) as total_donasi'))
                                      ->join('users', 'donasi.pemilik_id','=','users.id')
                                      ->join('jenis_kategori','donasi.jenis_donasi','=','jenis_kategori.id')
                                      ->join('districts','districts.id','=','users.lokasi_id')
                                      ->where('districts.regency_id','=',$adminlokasi)
                                      ->where('donasi.status','!=','Batal')
                                      ->where('donasi.status','!=','Menunggu')
                                      ->groupBy('jenis_kategori.jenis_kategori')
                                      ->orderBy('donasi.jenis_donasi','asc')->get()->toArray();
        $nama_populer = array_column($donasi_populer,'nama');
        $total_populer = array_column($donasi_populer,'total_donasi');

        return view('Admin.statistik',compact('donasi','daerah_jemput','lokasi_kabupaten','nama','total','nama_populer','total_populer','time'));
        }
        else{
          $time = "di Tahun ". $request->input('filter');
          $daerah_jemput = Donasi::select('districts.name',DB::raw('count(districts.id) as total'))
                                      ->join('users', 'donasi.pemilik_id','=','users.id')
                                      ->join('districts','districts.id','=','users.lokasi_id')
                                      ->where('districts.regency_id','=',$adminlokasi)
                                      ->where('donasi.status','=','Telah Dijemput')
                                      ->filterTotal($search)
                                      ->groupBy('districts.name')
                                      ->orderBy('total','desc')->get()->toArray();
        $nama = array_column($daerah_jemput,'name');
        $total = array_column($daerah_jemput,'total');

         $donasi_populer = Donasi::select('jenis_kategori.jenis_kategori as nama',DB::raw('COUNT(donasi.jenis_donasi) as total_donasi'))
                                      ->join('users', 'donasi.pemilik_id','=','users.id')
                                      ->join('jenis_kategori','donasi.jenis_donasi','=','jenis_kategori.id')
                                      ->join('districts','districts.id','=','users.lokasi_id')
                                      ->where('districts.regency_id','=',$adminlokasi)
                                      ->where('donasi.status','!=','Batal')
                                      ->where('donasi.status','!=','Menunggu')
                                      ->groupBy('jenis_kategori.jenis_kategori')
                                      ->orderBy('donasi.jenis_donasi','asc')->get()->toArray();
        $nama_populer = array_column($donasi_populer,'nama');
        $total_populer = array_column($donasi_populer,'total_donasi');

        return view('Admin.statistik',compact('donasi','daerah_jemput','lokasi_kabupaten','nama','total','nama_populer','total_populer','time'));

        }
    }

    public function statistikDonasi(Request $request)
    {
        $search = $request->input('id_categoris');
        $adminlokasi = Auth::guard('admin')->user()->lokasi;
        $lokasi_kabupaten = DB::table('regencies')->where('id','=',$adminlokasi)->first();
        if(is_null($search)){
          $search =1;
        $donasi = Donasi::select('jenis_kategori.jenis_kategori as nama',DB::raw('SUM(donasi.jumlah_donasi) as total_donasi'))
                                      ->join('users', 'donasi.pemilik_id','=','users.id')
                                      ->join('jenis_kategori','donasi.jenis_donasi','=','jenis_kategori.id')
                                      ->join('districts','districts.id','=','users.lokasi_id')
                                      ->where('districts.regency_id','=',$adminlokasi)
                                      //->where('jenis_kategori.id_categoris','=',1)
                                      //->filterKategori($search)
                                      ->where('donasi.status','!=','Batal')
                                      ->where('donasi.status','!=','Menunggu')
                                      ->groupBy('jenis_kategori.jenis_kategori')
                                      ->orderBy('total_donasi','desc')->get()->toArray();
        $kategoris = Categori::all();
        $nama = array_column($donasi,'nama');
        $jenis = " Semua Kategori";
        $total = array_column($donasi,'total_donasi');
        return view('Admin.statistikDonasi',compact('donasi','nama','total','lokasi_kabupaten','kategoris','search','jenis'));  
        }
        else{
           $donasi = Donasi::select('jenis_kategori.jenis_kategori as nama',DB::raw('SUM(donasi.jumlah_donasi) as total_donasi'))
                                      ->join('users', 'donasi.pemilik_id','=','users.id')
                                      ->join('jenis_kategori','donasi.jenis_donasi','=','jenis_kategori.id')
                                      ->join('districts','districts.id','=','users.lokasi_id')
                                      ->where('districts.regency_id','=',$adminlokasi)
                                      //->where('jenis_kategori.id_categoris','=',1)
                                      ->filterKategori($search)
                                      ->where('donasi.status','!=','Batal')
                                      ->where('donasi.status','!=','Menunggu')
                                      ->groupBy('jenis_kategori.jenis_kategori')
                                      ->orderBy('total_donasi','desc')->get()->toArray();
            $kategoris = Categori::all();
            $nama = array_column($donasi,'nama');
            $total = array_column($donasi,'total_donasi');
            $jenis = Categori::where('id','=',$request->id_categoris)->get();
    
            $jenis = "Kategori" ." ". $jenis[0]->kategori_nama;
          
            return view('Admin.statistikDonasi',compact('donasi','nama','total','lokasi_kabupaten','kategoris','jenis','search')); 
        }
  }
  public function pakar()
  {
     $variablejarak = DB::table('pakar')->where('id','=',1)->get();
        $variableItem = DB::table('pakar')->where('id','=',2)->get();
        $j_bAtas = $variablejarak[0]->batas_atas;
        $j_bBawah = $variablejarak[0]->batas_bawah;
        $i_bAtas = $variableItem[0]->batas_atas;
        $i_bBawah = $variableItem[0]->batas_bawah;

        return view('Admin.pakar',compact('j_bAtas','j_bBawah','i_bAtas','i_bBawah','variableItem','variablejarak'));
  }
  public function simpanpakar(Request $request)
  {

            $jarak = DB::table('pakar')->where('id','=',1);
            $jarak->update([
            'batas_atas' => request('j_bAtas'),
            'batas_bawah' => request('j_bBawah')
       
            ]);

            $item = DB::table('pakar')->where('id','=',2);
            $item->update([
            'batas_atas' => request('i_bAtas'),
            'batas_bawah' => request('i_bBawah')
       
            ]);
        

        return redirect('/admin/pakar');

  }
/*
  public function filter_statistikDonasi(Request $request)
    {
        $adminlokasi = Auth::guard('admin')->user()->lokasi;
        $lokasi_kabupaten = DB::table('regencies')->where('id','=',$adminlokasi)->first();
        $donasi = Donasi::select('jenis_kategori.jenis_kategori as nama',DB::raw('SUM(donasi.jumlah_donasi) as total_donasi'))
                                      ->join('users', 'donasi.pemilik_id','=','users.id')
                                      ->join('jenis_kategori','donasi.jenis_donasi','=','jenis_kategori.id')
                                      ->join('districts','districts.id','=','users.lokasi_id')
                                      ->where('districts.regency_id','=',$adminlokasi)
                                      ->where('jenis_kategori.id_categoris','=',$request->id_categoris)
                                      ->where('donasi.status','!=','Batal')
                                      ->where('donasi.status','!=','Menunggu')
                                      ->groupBy('jenis_kategori.jenis_kategori')->get()->toArray();
        $kategoris = Categori::all();
        $nama = array_column($donasi,'nama');
        $total = array_column($donasi,'total_donasi');
        $jenis = Categori::where('id','=',$request->id_categoris)->get();
        return view('Admin.statistikDonasiFilter',compact('donasi','nama','total','lokasi_kabupaten','kategoris','jenis'));
      
  }

   */
}
