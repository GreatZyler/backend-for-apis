<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontrol;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [Usercontrol::class, 'login']);

Route::get("/all",[Usercontrol::class, 'all']);
Route::post("/edit",[Usercontrol::class, 'edit']);
Route::post("/update",[Usercontrol::class, 'up']);
Route::post("/del",[Usercontrol::class, 'del']);

Route::post("/newUser",[Usercontrol::class, 'userNew']);