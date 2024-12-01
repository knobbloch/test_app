<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestBook;

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

Route::get('/get_guestbook', [GuestBook::class, 'get_all']);
Route::post('/insert_guestbook', [GuestBook::class, 'insert']);

Route::get('/form_guestbook', function () {
    return view('guestbook');
});
Route::get('/api/captcha-refresh', function() {
    return captcha_img();
});
Route::delete('/delete_guestbook/{id}', [GuestBook::class, 'delete']);

