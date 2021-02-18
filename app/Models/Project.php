<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public $fillable = ['name'];

    public function state() {
        return $this->hasOne(ProjectState::class, 'id', 'project_state_id');
    }

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function projectLead() {
        return $this->hasOne(User::class, 'id', 'project_lead_id');
    }

    /**
     * TODO: Setup the migration for this relationship.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function staff() {
        return $this->hasMany(User::class);
    }

}
