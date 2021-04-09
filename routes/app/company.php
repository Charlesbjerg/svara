<?php

// Project meta options
Route::get('/project-meta', [App\Http\Controllers\ProjectMetaController::class, 'index']);
Route::post('/project-meta', [App\Http\Controllers\ProjectMetaController::class, 'store']);
Route::patch('/project-meta/{meta}', [App\Http\Controllers\ProjectMetaController::class, 'update']);
Route::delete('/project-meta/{meta}', [App\Http\Controllers\ProjectMetaController::class, 'destroy']);