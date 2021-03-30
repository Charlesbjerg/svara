<?php

Route::prefix('projects/pipeline/boards')->group(function() {
    Route::get('/{board:pipeline_entity_id}', [\App\Http\Controllers\Pipeline\Boards\BoardController::class, 'show']);
    Route::get('/card/{card}', [\App\Http\Controllers\Pipeline\Boards\BoardCardController::class, 'show']);
    Route::post('/card', [\App\Http\Controllers\Pipeline\Boards\BoardCardController::class, 'store']);
});