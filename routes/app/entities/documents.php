<?php

use App\Http\Controllers\Pipeline\DocumentController;

Route::prefix('projects/pipeline/documents')->group(function() {
    Route::get('/{documents:pipeline_entity_id}', [DocumentController::class, 'index']);
    Route::post('/', [DocumentController::class, 'store']);
    Route::get('/download/{file}', [DocumentController::class, 'download']);
});