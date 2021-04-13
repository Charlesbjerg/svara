<?php

namespace App\Models;

use Eloquence\Behaviours\CamelCasing;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    use HasFactory, CamelCasing;

    protected $guarded = [];

    public function entity() {
        return $this->belongsTo(PipelineEntity::class);
    }

    public function pipelinePhase() {
        return $this->belongsTo(PipelinePhase::class);
    }

    public function items() {
        return $this->hasMany(ChecklistItem::class, 'checklist_id', 'id');
    }

}
