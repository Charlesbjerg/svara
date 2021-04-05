<?php

namespace App\Models;

use Eloquence\Behaviours\CamelCasing;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageThreadMessage extends Model
{
    use HasFactory;
    use CamelCasing;

    public $fillable = ['message'];

    public function thread() {
        return $this->belongsTo(MessageThread::class, 'id', 'thread_id');
    }

    public function postedBy() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function attachments() {
        return $this->hasMany(MessageThreadAttachment::class);
    }

}
