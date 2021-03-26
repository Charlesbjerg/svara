<?php

namespace App\Models;

use Eloquence\Behaviours\CamelCasing;
use Illuminate\Database\Eloquent\Relations\Pivot;

class BoardColumn extends Pivot
{
    use CamelCasing;

    public function board() {
        return $this->belongsTo(Board::class);
    }

    public function cards() {
        return $this->hasMany(BoardCard::class);
    }

}
