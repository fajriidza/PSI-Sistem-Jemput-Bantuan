<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        /*
        switch ($guard) {
            case 'admin' :
                if (Auth::guard('admin')->check()) {
                    return redirect()->route('dashboardadmin');
                }
                break;
            case 'petugas' :
                if (Auth::guard('petugas')->check()) {
                    return redirect()->route('dashboarpetugas');
                }
                break;
            default:
                if (Auth::guard('web')->check()) {
                    return redirect()->route('dashboarduser');
                }
                break; 
            */
                if (Auth::guard('admin')->check()) {
                    return redirect()->route('verif.donasi');
                }
                else if (Auth::guard('petugas')->check()) {
                    return redirect()->route('verif.donasi');
                }
                else if (Auth::guard('web')->check()) {
                    return redirect()->route('utama');
                }
               
            
        return $next($request);
    }

}
