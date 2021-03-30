<?php

// Standard Project Routes
Route::resource('/projects', \App\Http\Controllers\ProjectController::class);
Route::get('/projects/{project}/staff', [\App\Http\Controllers\ProjectController::class, 'allStaffMembers']);

// Pipeline Routes
Route::resource('/projects/pipeline/entities', \App\Http\Controllers\Pipeline\PipelineEntityController::class);
Route::get('/projects/pipeline/{project}', [\App\Http\Controllers\Pipeline\ProjectPipelineController::class, 'show']);

// Add Entity routes
require __DIR__ . '/entities/boards.php';
require __DIR__ . '/entities/checklists.php';
require __DIR__ . '/entities/documents.php';