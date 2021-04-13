<?php
use App\Http\Controllers\TeamController;

// Add/Remove users from team routes
Route::get('teams/find-user', [TeamController::class, 'search']);
Route::post('teams/{team}/user/{user}', [TeamController::class, 'storeUser']);
Route::delete('teams/{team}/user/{user}', [TeamController::class, 'destroyUser']);

// Generic team routes
Route::resource('teams', TeamController::class);