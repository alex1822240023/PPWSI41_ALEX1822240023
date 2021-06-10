<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MahasiswaApiController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource("mhs", MahasiswaApiController::class);
});

//Buat route login
Route::post("/login", [AuthController::class, "login"]);

Route::get("/", function(){
    return array("status" => true, "pesan" => "Hallo Sayang");
});

Route::get("/hallo/{nama?}/{npm?}", function($nama = "Joe", $npm = NULL){
    $mhs = array(
        "nama" => $nama,
        "npm" => $npm);
    return array(
        "status" => true, 
        "pesan" => "Hallo $nama",
        "mhs" => $mhs
    );
});
// Buat Controller > php artisan make:controller HomeController
Route::get("/home", [HomeController::class,  "index"]);
Route::get("/home/kenalan/{nama?}", [HomeController::class,  "kenalan"]);

//Buat API Controller atau Resource Controller utk kelola data MHS
//Nama Controller adalah MahasiswaController
// php artisan make:controller MahasiswaController --api
//Daftar Resource Controller :MahasiswaController ke path mahasiswa
Route::apiResource("mahasiswa", MahasiswaController::class);
Route::get('/mahasiswa/insert', 'MahasiswaController@insert');
// Route::apiResource("mhs", MahasiswaApiController::class);

