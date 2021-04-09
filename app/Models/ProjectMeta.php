<?php

namespace App\Models;

use Eloquence\Behaviours\CamelCasing;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectMeta extends Model
{
    use HasFactory;
    use CamelCasing;

    public function project() {
        return $this->belongsTo(Project::class);
    }

    /**
     * Checks if the current project meta item is sortable
     *
     * @return bool
     */
    public function isSortable() {
        return $this->sortable === 1;
    }

}
