<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AcceptRequestController extends Controller
{
    public function __invoke(Request $request)
    {
        User::create([
            'email' => $request->email,
            'ehr_id' => $request->ehrId,
            'name' => $request->name
        ]);

        DB::table('request')->where('ehr_id', $request->ehrId)->delete();
    }
}
