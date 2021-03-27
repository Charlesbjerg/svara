<?php

namespace App\Models;

use Eloquence\Behaviours\CamelCasing;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;
    use CamelCasing;

    protected $fillable = ['name'];

    public function entity() {
        return $this->belongsTo(PipelineEntity::class);
    }

    /**
     * TODO: Join table may need setting up for this
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pipelinePhase() {
        return $this->belongsTo(PipelinePhase::class);
    }

    public function columns() {
        return $this->hasMany(BoardColumn::class);
    }

}
