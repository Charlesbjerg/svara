<?php

namespace App\Models;

use Eloquence\Behaviours\CamelCasing;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectMeta extends Model
{
    use HasFactory;
    use CamelCasing;

    protected $fillable = ['value_type', 'sortable'];
    public $timestamps = false;

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

    /**
     * Converts a meta key from snake case to a standard
     * string.
     *
     * @param $key
     * @return string
     */
    public function getKeyAttribute($key) {
//        dd(ucwords(str_replace('_', ' ', $key)));
        return ucwords(str_replace('_', ' ', $key));
    }

}
