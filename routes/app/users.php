<?php
/**
 * Controllers for these routes are found in the users folder. Route handlers are split
 * into Client and Staff controllers. Routes should do the same.
 *
 * UserStaffController -> /users/staff
 * UserClientController -> /users/clients
 */

// Search for staff member
Route::get('/users/staff', [\App\Http\Controllers\Users\UserStaffController::class, 'index'])->name('users.staff');

// Search specifically for account managers
Route::get('/users/account-managers', [\App\Http\Controllers\Users\UserStaffController::class, 'filter'])->name('users.account-managers');

// Search specifically for project leads
Route::get('/users/project-leads', [\App\Http\Controllers\Users\UserStaffController::class, 'filter'])->name('users.project-leads');

// Search user by name ignoring type
Route::get('/users', [\App\Http\Controllers\Users\UserController::class, 'index'])->name('users');

// Find all user types and teams
Route::get('/users/setup-data', [\App\Http\Controllers\Users\UserStaffController::class, 'setupData'])->name('user.setup-data');
