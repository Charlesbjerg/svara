<?php

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

// Defaults to '/' for any route unless it starts with '/api/'
Route::get('/{any}', [\App\Http\Controllers\ViewController::class, 'app'])->where('any','^(?!api).*$');

require __DIR__.'/auth.php';