<?php

use App\Http\Controllers\Pipeline\DocumentController;

Route::prefix('projects/pipeline/documents')->group(function() {
    Route::get('/{pipeline_entity_id}', [DocumentController::class, 'index']);
    Route::post('/', [DocumentController::class, 'store']);
    Route::get('/download/{document}', [DocumentController::class, 'download']);
});