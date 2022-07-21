<?php

use App\Http\Controllers\BolpatraController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/home', [BolpatraController::class, 'store'])->name('home.store');
Route::get('edit/{id}', [BolpatraController::class, 'edit'])->name('edit');
Route::post('update/{id}', [BolpatraController::class, 'update'])->name('update');
Route::get('delete/{id}', [BolpatraController::class, 'delete'])->name('delete');
