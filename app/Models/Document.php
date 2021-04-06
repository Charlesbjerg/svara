<?php

namespace App\Models;

use Eloquence\Behaviours\CamelCasing;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    use HasFactory;
    use CamelCasing;

    protected $fillable = ['name'];

    /**
     * @return BelongsTo
     */
    public function entity() {
        return $this->belongsTo(PipelineEntity::class);
    }

    /**
     * @return BelongsTo
     */
    public function pipelinePhase() {
        return $this->belongsTo(PipelinePhase::class);
    }


    public function getSystemPath() {
//        return storage_path('app/'. $this->path);
        return 'storage/app/' . $this->path;
    }

}
