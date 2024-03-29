<?php

namespace App\Models;

use Eloquence\Behaviours\CamelCasing;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageThread extends Model
{
    use HasFactory;
    use CamelCasing;

    protected $fillable = ['title', 'shared_with_client'];
    protected $casts = [
        'shared_with_client' => 'boolean',
    ];

    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function messages() {
        return $this->hasMany(MessageThreadMessage::class, 'thread_id', 'id');
    }

}
