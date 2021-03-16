<?php

namespace App\Models;

use Eloquence\Behaviours\CamelCasing;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PipelinePhase extends Model
{
    use HasFactory;
    use CamelCasing;

    public $timestamps = false;

    protected $fillable = ['name', 'sort_order', 'project_id'];

    /**
     * Entities used in this pipeline section
     */
    public function entities() {
        return $this->belongsToMany(PipelineEntity::class, 'project_pipelines_to_entities', 'pipeline_id', 'entity_id');
    }

    public function project() {
        return $this->belongsTo(Project::class, 'id', 'project_id');
    }

}
