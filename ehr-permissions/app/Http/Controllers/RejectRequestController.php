<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RejectRequestController extends Controller
{
    public function __invoke(Request $request)
    {
        DB::table('request')->where('email', $request->email)->delete();
    }
}
