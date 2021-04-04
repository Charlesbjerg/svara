<?php

Route::prefix('projects/pipeline/boards')->group(function() {

    // Standard board routes
    Route::get('/{board:pipeline_entity_id}', [\App\Http\Controllers\Pipeline\Boards\BoardController::class, 'show']);
    Route::patch('/{board:pipeline_entity_id}', [\App\Http\Controllers\Pipeline\Boards\BoardController::class, 'update']);

    // Column routes
    Route::post('/column', [\App\Http\Controllers\Pipeline\Boards\BoardColumnController::class, 'store']);
    Route::patch('/column/{column}', [\App\Http\Controllers\Pipeline\Boards\BoardColumnController::class, 'update']);

    // Card routes
    Route::get('/card/{card}', [\App\Http\Controllers\Pipeline\Boards\BoardCardController::class, 'show']);
    Route::post('/card', [\App\Http\Controllers\Pipeline\Boards\BoardCardController::class, 'store']);
    Route::patch('/card/{card}', [\App\Http\Controllers\Pipeline\Boards\BoardCardController::class, 'update']);



});