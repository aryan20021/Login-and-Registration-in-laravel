<?php

use App\Http\Controllers\AuthManager;
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
    return view('welcome');
})->name('home');

Route::get('/login',[AuthManager::class, 'login'])->name('login');
Route::post('/login',[AuthManager::class, 'loginPost'])->name('login.post');


Route::get('/registration',[AuthManager::class, 'registration'] )->name('new.user');
Route::post('/registration',[AuthManager::class, 'registrationPost'] )->name('new.user.post');

Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');


// Route::group(['middleware' => 'auth'],function(){
// place the route which only the authorize user can aceess.
// })



