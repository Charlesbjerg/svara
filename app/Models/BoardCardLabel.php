<?php

namespace App\Models;

use Eloquence\Behaviours\CamelCasing;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardCardLabel extends Model
{
    use HasFactory;
    use CamelCasing;

    public $timestamps = false;

    public function card() {
        return $this->belongsTo(BoardCard::class);
    }
}
