<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();

        return redirect('/hotel');
    }


    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        // Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login.form');

        // if(Auth::guard('manager')->check()) // this means that the admin was logged in.
        // {
        //     Auth::guard('manager')->logout();
        //     return redirect()->route('loginManager.form');
        // }
    
        // $this->guard()->logout();
        // $request->session()->invalidate();
    
        // return $this->loggedOut($request) ?: redirect('/manager/login');
    }

    // public function logout( Request $request )
    // {
    //     dd('manager');
    //     if(Auth::guard('manager')->check()) // this means that the admin was logged in.
    //     {
    //         Auth::guard('manager')->logout();
    //         return redirect()->route('loginManager.form');
    //     }
    
    //     $this->guard()->logout();
    //     $request->session()->invalidate();
    
    //     return $this->loggedOut($request) ?: redirect('/manager/login');
    // }



}
