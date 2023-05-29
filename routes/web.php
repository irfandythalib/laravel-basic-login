<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Blogss;
use App\Http\Controllers\Masjidcontroller;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'App\Http\Controllers\Admin@index');
Route::get('/login', 'App\Http\Controllers\Login@index');
Route::post('/login', 'App\Http\Controllers\Login@login');
Route::get('/logout','App\Http\Controllers\Login@logout'); //Page:Show Login page



//Blog
// Route::resource('/blog', Blogss::class);

