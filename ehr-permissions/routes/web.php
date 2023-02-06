<?php

use App\Http\Controllers\AcceptRequestController;
use App\Http\Controllers\AllscriptLoginController;
use App\Http\Controllers\AthenaLoginController;
use App\Http\Controllers\EpicLoginController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RejectRequestController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/epic', EpicLoginController::class);

Route::get('/athena', AthenaLoginController::class);

Route::get('/allscript', AllscriptLoginController::class);

Route::get('/admin', function () {
    return view('login');
});

Route::post('/login', LoginController::class);

Route::get('/requests', function () {
    $requests = DB::table('request')->get();
    return view('admin', ['requests' => $requests]);
})->name('requests');

Route::post('/accept', AcceptRequestController::class);

Route::post('/reject', RejectRequestController::class);
