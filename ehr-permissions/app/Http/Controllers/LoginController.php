<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $requests = DB::table('request')->get();
            return view('admin', ['requests' => $requests]);
        } else {
            return view('login');
        }
    }
}
