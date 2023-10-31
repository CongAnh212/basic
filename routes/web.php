<?php

use App\Http\Controllers\ChuyenMucController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('wrapper.share_admin.master');
});

Route::get('/chuyen-muc', function () {
    return view('chuyen-muc.index');
});

Route::get('/chuyen-muc/data', [ChuyenMucController::class, 'getData']);

Route::post("/chuyen-muc/create", [ChuyenMucController::class, "themMoi"]);
