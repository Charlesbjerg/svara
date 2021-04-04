<?php

namespace App\Models;

use Eloquence\Behaviours\CamelCasing;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageThreadAttachment extends Model
{
    use HasFactory;
    use CamelCasing;

    public $timestamps = false;

    public function message() {
        return $this->belongsTo(MessageThreadMessage::class);
    }

}
