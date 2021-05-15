<?php

namespace App\Models;

use Eloquence\Behaviours\CamelCasing;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectSignoff extends Model
{
    use HasFactory, CamelCasing;

    public $timestamps = false;

    public $fillable = ['name', 'message', 'pipeline_entity_id'];

    public function entity() {
        return $this->belongsTo(PipelinePhase::class, 'id', 'pipeline_entity_id');
    }

}
