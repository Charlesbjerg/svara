<?php

namespace App\Models;

use Eloquence\Behaviours\CamelCasing;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChecklistItem extends Model
{
    use HasFactory, CamelCasing;

    protected $guarded = ['complete', 'assigned_user_id'];

    protected $casts = [
        'complete' => 'boolean'
    ];

    public function checklist() {
        return $this->belongsTo(Checklist::class, 'id', 'checklist_id');
    }

    public function assignedUser() {
        return $this->hasOne(User::class, 'id', 'assigned_user_id');
    }

    public function createdBy() {
        return $this->hasOne(User::class, 'id', 'created_by_id');
    }

}
