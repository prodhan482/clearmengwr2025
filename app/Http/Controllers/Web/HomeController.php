<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

     public function home()
    {
        return view('home');
    }


    public function login()
    {
        return view('web.login');
    }
}
