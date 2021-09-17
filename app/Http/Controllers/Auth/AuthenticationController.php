<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class AuthenticationController extends Controller
{

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        // $request->authenticate();
        $auth = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        $request->session()->regenerate();
        if (!$auth) {
            return redirect('/signin')->with('error','user id or password is incorrect or not available');
        }else{
        // if (Auth::user()->user_type == 'admin') {
            //     return redirect('/AddAuthors');
        // } else {
            return redirect()->intended('/user_panel')->with("user_id",Auth::user()->user_id);
        // }
    }
}


public function destroy(Request $request)
    {
        // dd($request);
        Auth::guard('web')->logout();
        
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
