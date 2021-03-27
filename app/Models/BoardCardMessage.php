<?php

namespace App\Models;

use Eloquence\Behaviours\CamelCasing;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardCardMessage extends Model
{
    use HasFactory;
    use CamelCasing;

    public function card() {
        return $this->belongsTo(BoardCard::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
