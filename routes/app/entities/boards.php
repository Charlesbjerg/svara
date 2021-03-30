<?php

Route::prefix('projects/pipeline/boards')->group(function() {
    Route::get('/{board:pipeline_entity_id}', [\App\Http\Controllers\Pipeline\Boards\BoardController::class, 'show']);
});