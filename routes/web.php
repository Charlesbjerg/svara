<?php

use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Pipeline\Signoffs\ProjectSignoffController;
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

Route::get('/mail-test', function() {
    $user = App\Models\User::all()->last();
    return new App\Mail\ProjectSignoffNotification($user, \App\Models\ProjectSignoff::first());
});

// These routes require interaction with static views (not the SPA)
Route::get('/projects/pipeline/signoffs/{signoff}/view', [ProjectSignoffController::class, 'showSignoff']);
Route::get('/activate/{key}', [RegisteredUserController::class, 'show']);
Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');
Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');

// Api Routes
Route::prefix('api')->group(function() {

    // Dashboard
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'show']);

    // Require other routes
    require __DIR__ . '/app/auth.php';
    require __DIR__ . '/app/projects.php';
    require __DIR__ . '/app/clients.php';
    require __DIR__ . '/app/teams.php';
    require __DIR__ . '/app/company.php';
    require __DIR__ . '/app/users.php';

});

// Defaults to '/' for any route unless it starts with '/api/'
Route::get('/', [\App\Http\Controllers\ViewController::class, 'app'])
    ->name('app.landing');

Route::get('/{any}', [\App\Http\Controllers\ViewController::class, 'app'])
    ->where('any','^(?!api).*$');

