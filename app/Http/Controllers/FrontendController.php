<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function adminHome()
    {
        return view('adminhome');
    }
    public function adminform()
    {
        return view('form');
    }
    public function admintable()
    {
        return view('table1');
    }
    public function admintabledata()
    {
        return view('table2');
    }
    public function showmore()
    {
        return view('showmore');
    }
    public function login_portal()
    {
        return view('login');
    }
    public function signup_portal()
    {
        return view('signup');
    }
}
