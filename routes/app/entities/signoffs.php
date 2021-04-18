<?php

use App\Http\Controllers\Pipeline\Signoffs\ProjectSignoffTemplateController;
use App\Http\Controllers\Pipeline\Signoffs\ProjectSignoffController;

Route::prefix('projects/pipeline/signoffs')->group(function() {

    // Need CRUD on templates
    Route::resource('/templates', ProjectSignoffTemplateController::class);

    // Need to display/edit sign off
    Route::get('/{pipeline_entity_id}', [ProjectSignoffController::class, 'index']);
    Route::patch('/{signoff:pipeline_entity_id}', [ProjectSignoffController::class, 'update']);

    // Dispatch client notification email
    Route::get('/{signoff}/dispatch', [ProjectSignoffController::class, 'dispatchNotif']);

    // Process sign-off request
    Route::post('/{signoff:pipeline_entity_id}/signoff', [ProjectSignoffController::class, 'signoff']);

});