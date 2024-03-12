<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [Controller::class, 'index'])->name('index');
Route::post('/store-appeal', [Controller::class, 'store'])->name('store');
Route::get('/reload-captcha', [Controller::class, 'reloadCaptcha'])->name('reload-captcha');
Route::post('/check-status', [Controller::class, 'checkStatus'])->name('check-status');
Route::get('/download/{id}', [Controller::class, 'download'])->name('download');
Route::get('/get-regions', [Controller::class, 'getRegions'])->name('getRegions');

Auth::routes(
    ['register' =>false]
);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/appeal', [HomeController::class, 'appealIndex'])->name('appealIndex');

Route::get('/region', [HomeController::class, 'regionIndex'])->name('regionIndex');
Route::get('/create', [HomeController::class, 'regionCreate'])->name('regionCreate');
Route::post('/store', [HomeController::class, 'regionStore'])->name('regionStore');
Route::get('/edit/{region}', [HomeController::class, 'regionEdit'])->name('regionEdit');
Route::put('/update/{region}', [HomeController::class, 'regionUpdate'])->name('regionUpdate');
