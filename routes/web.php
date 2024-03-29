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
    return new App\Mail\SendSignedOffNotif(App\Models\Project::where('id', 76)->first(), \App\Models\ProjectSignoff::where('id', 10)->first());
});

// These routes require interaction with static views (not the SPA)
Route::get('/projects/pipeline/signoffs/{signoff}/view', [ProjectSignoffController::class, 'showSignoff']);
Route::get('/activate/{key}', [RegisteredUserController::class, 'show'])
    ->middleware('guest')
    ->name('activate');
Route::post('/activate/{key}', [RegisteredUserController::class, 'activate'])
    ->middleware('guest')
    ->name('activate.post');
Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');
Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');

// Api Routes
Route::prefix('api')->group(function() {

    // Dashboard
    Route::get('/dashboard/client', [\App\Http\Controllers\DashboardController::class, 'client']);
    Route::get('/dashboard/staff', [\App\Http\Controllers\DashboardController::class, 'staff']);

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

