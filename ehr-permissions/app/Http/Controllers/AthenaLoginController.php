<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class AthenaLoginController extends Controller
{
    public function __invoke(Request $request)
    {
        logger($request);
    }
}
