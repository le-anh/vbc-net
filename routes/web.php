<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ServiceAPIController;
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
    return view('index');
})->name('user_home');

// Route::get('login', function () {
//     return view('login');
// })->name('login');

Route::get('login', [LoginController::class, 'login'])->name('get_login');
Route::post('login', [ServiceAPIController::class, 'LogIn'])->name('post_login');
