<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegistrationController extends Controller
{
    public function register(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'mobile' => 'required|string|max:255',
            "instituteName"=>"required|string|max:255",
        ]);

        Auth::login($user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_id' => 'u_'.rand(10000000,99999999),
            'mobile' => $request->mobile,
            'instituteName'=>$request->instituteName,
        ]));

        event(new Registered($user));

        return redirect()->intended('/user_panel');
    }
}
