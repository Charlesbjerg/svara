<?php

use App\Http\Controllers\Pipeline\Signoffs\ProjectSignoffTemplateController;
use App\Http\Controllers\Pipeline\Signoffs\ProjectSignoffController;

Route::prefix('projects/pipeline/signoffs')->group(function() {

    // Need CRUD on templates
    Route::resource('/templates', ProjectSignoffTemplateController::class);

    // Need to display/edit sign off
    Route::get('/{pipeline_entity_id}', [ProjectSignoffController::class, 'index']);
    Route::patch('/{pipeline_entity_id}', [ProjectSignoffController::class, 'update']);

    // Need to render client view and process sign off
    Route::get('/{signoff}/dispatch', [ProjectSignoffController::class, 'dispatchNotif']);
    Route::get('/{projectSignoff:pipeline_entity_id}/view', [ProjectSignoffController::class, 'showSignoff']);
    Route::post('/{projectSignoff:pipeline_entity_id}/signoff', [ProjectSignoffController::class, 'signoff']);


});