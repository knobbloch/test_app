<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
    return view('welcome');
});


Route::get('/admin/login', function () {
    return view('login');
})->name('login'); 

Route::post('/admin/login', [AdminController::class, 'login']);

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->name('web.admin.dashboard')
    ->middleware('auth'); 
