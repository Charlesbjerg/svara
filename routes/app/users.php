<?php
/**
 * Controllers for these routes are found in the users folder. Route handlers are split
 * into Client and Staff controllers. Routes should do the same.
 *
 * UserStaffController -> /users/staff
 * UserClientController -> /users/clients
 */

// Search for staff member
Route::get('/users/staff', [\App\Http\Controllers\Users\UserStaffController::class, 'index']);

// Find all user types and teams
Route::get('/users/setup-data', [\App\Http\Controllers\Users\UserStaffController::class, 'setupData']);