<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;


class LoginController extends Controller
{
    public function login(Request $request)
    {
        return view('login');
    }
}
