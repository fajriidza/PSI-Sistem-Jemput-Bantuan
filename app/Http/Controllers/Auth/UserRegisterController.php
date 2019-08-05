<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\provinces;
use App\regencies;
use DB;
use Hash;
use Illuminate\Support\Facades\Validator;

class UserRegisterController extends Controller
{
	protected $redirectTo = '/';
    public function showRegistrationForm()
    {
    	$provinces = DB::table('provinces')->where('id',34)->get();
        $regencies = DB::table('regencies')->where('province_id',34)->orderBy('regencies.name')->pluck("name","id")->all();
        return view('User.daftar',compact('provinces','regencies'));
    }
    public function store(Request $request)
    {
        $user = User::all();

        
    	$validasi = Validator::make($request->all(),[
            'password' => 'min:6|required_with:repassword|same:repassword',
			'repassword' => 'min:6'
        ]);

        if (count($user)<=0){
            if($validasi->passes()){

                if($request->password == $request->repassword){
                    $user = new User();
                    $user->name = $request->nama;
                    $user->no_hp = $request->no_hp;
                    $user->alamat = $request->alamat;
                    $user->lokasi_id = $request->id_districts;
                    $user->email = $request->email;
                    $user->password = Hash::make($request->password);
                    $user->save();
                    return redirect('/login');
                }
                else{
                 return redirect()->to('/daftar')->with('alert','Password dan Konfirmasi Password Berbeda')->withInput($request->only('email'));
                }
                
            }
        }
        else{

            foreach ($user as $user ) {

                if ($user->email == $request->email){

                     return redirect()->to('/daftar')->with('alert','Email sudah digunakan')->withInput($request->only('email'));
                }
                else if($validasi->passes()){

                    if($request->password != $request->repassword){
                         return redirect()->to('/daftar')->with('alert','Password dan Konfirmasi Password Berbeda')->withInput($request->only('email'));
                    }
                    else{
                        $user = new User();
                        $user->name = $request->nama;
                        $user->no_hp = $request->no_hp;
                        $user->alamat = $request->alamat;
                        $user->lokasi_id = $request->id_districts;
                        $user->email = $request->email;
                        $user->password = Hash::make($request->password);
                        $user->save();
                        return redirect('/login');

                    }

                }
            }
                
        }
       
        

     }

}
