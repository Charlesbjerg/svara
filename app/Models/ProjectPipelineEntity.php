<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProjectPipelineEntity extends Pivot
{

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    public $table = 'project_pipelines_to_entities';

    /**
     * The pipeline phase this entity belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pipeline() {
        return $this->belongsTo(PipelinePhase::class);
    }

    /**
     * The entity in this pipeline phase.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entity() {
        return $this->belongsTo(PipelineEntity::class);
    }

}
