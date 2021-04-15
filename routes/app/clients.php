<?php

Route::get('/clients/filter', [\App\Http\Controllers\ClientController::class, 'filter']);
Route::resource('/clients', \App\Http\Controllers\ClientController::class);
