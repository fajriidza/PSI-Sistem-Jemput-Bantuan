<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{

  protected $redirectTo = '/admin';

	public function __construct()
    {
        $this->middleware('guest:admin');
    }
    public function showLoginForm(){
    	return view('Admin.loginPetugas');
    }

    public function login(Request $request){
    	// Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);

      // Attempt to log the user in
      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location
        session(['key' => $request->email]);
        return redirect()->intended(route('verif.donasi'));
      }
      else {

        // if unsuccessful, then redirect back to the login with the form data;
      return redirect()->back()->with('alert','Password atau Email, Salah !')->withInput($request->only('email', 'remember'));

      }
  
    }
}
