<?php

use App\Http\Controllers\MessageThreadController;
use App\Http\Controllers\MessageThreadMessageController;
use App\Http\Controllers\Pipeline\PipelineEntityController;
use App\Http\Controllers\Pipeline\ProjectPipelineController;
use App\Http\Controllers\ProjectController;

// Standard Project Routes
Route::resource('/projects', ProjectController::class);
Route::get('/projects/{project}/staff', [ProjectController::class, 'allStaffMembers']);

// Pipeline Routes
Route::resource('/projects/pipeline/entities', PipelineEntityController::class);
Route::get('/projects/pipeline/{project}', [ProjectPipelineController::class, 'show']);
Route::post('/projects/pipeline/phase/{pipelinePhase}/complete', [ProjectPipelineController::class, 'completePhase']);

// Message Thread Routes
Route::get('/projects/message-threads/all/{projectId}', [MessageThreadController::class, 'index']);
Route::get('/projects/message-threads/{thread}', [MessageThreadController::class, 'show']);
Route::post('/projects/message-threads', [MessageThreadController::class, 'store']);
Route::post('/projects/message-threads/message', [MessageThreadMessageController::class, 'store']);

// Add Entity routes
require __DIR__ . '/entities/boards.php';
require __DIR__ . '/entities/checklists.php';
require __DIR__ . '/entities/documents.php';