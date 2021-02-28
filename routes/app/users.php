<?php
/**
 * Controllers for these routes are found in the users folder. Route handlers are split
 * into Client and Staff controllers. Routes should do the same.
 *
 * UserStaffController -> /users/staff
 * UserClientController -> /users/clients
 */

Route::get('/users/staff', [\App\Http\Controllers\Users\UserStaffController::class, 'index']);