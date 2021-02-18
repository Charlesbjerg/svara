<?php

Route::resource('/projects', \App\Http\Controllers\ProjectController::class);
Route::get('/projects/{project}/staff', [\App\Http\Controllers\ProjectController::class, 'allStaffMembers']);