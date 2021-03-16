<?php

namespace App\Models;

use Eloquence\Behaviours\CamelCasing;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    use CamelCasing;

    protected $fillable = ['name'];

    public function state() {
        return $this->hasOne(ProjectState::class, 'id', 'project_state_id');
    }

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function projectLead() {
        return $this->belongsTo(User::class, 'project_lead_id', 'id');
    }

    public function staff() {
        return $this->belongsToMany(User::class, 'users_to_projects', 'project_id', 'user_id');
    }

    public function pipeline() {
        return $this->hasMany(PipelinePhase::class);
    }

}
