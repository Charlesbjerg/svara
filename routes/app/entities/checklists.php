<?php

use App\Http\Controllers\Pipeline\Checklists\ChecklistController;
use App\Http\Controllers\Pipeline\Checklists\ChecklistItemController;

Route::prefix('projects/pipeline')->group(function() {

    // Checklist item routes
    Route::get('/checklists/{checklist}/items', [ChecklistItemController::class, 'index']);
    Route::post('/checklists/{checklist}/items', [ChecklistItemController::class, 'store']);
    Route::get('/checklists/items/{item}', [ChecklistItemController::class, 'show']);
    Route::patch('/checklists/{checklist}/items/{item}', [ChecklistItemController::class, 'update']);
    Route::delete('/checklists/{checklist}/items/{item}', [ChecklistItemController::class, 'delete']);

    // Checklist routes
    Route::get('/checklists/{entityId}/', [ChecklistController::class, 'index']);
    Route::post('/checklists/{entityId}', [ChecklistController::class, 'store']);
    Route::get('/checklists/{checklist}', [ChecklistController::class, 'show']);
    Route::patch('/checklists/{checklist}', [ChecklistController::class, 'update']);
    Route::delete('/checklists/{checklist}', [ChecklistController::class, 'delete']);

});