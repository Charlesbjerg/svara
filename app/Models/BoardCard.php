<?php

namespace App\Models;

use Eloquence\Behaviours\CamelCasing;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardCard extends Model
{
    use HasFactory;
    use CamelCasing;

    public function column() {
        return $this->belongsTo(BoardColumn::class);
    }

    /**
     * Depends on column relationship to fetch the board this card
     * belongs to.
     * @return mixed
     */
    public function board() {
        return $this->column->board;
    }

    public function attachments() {
        return $this->hasMany(BoardCardAttachments::class);
    }

    public function messages() {
        return $this->hasMany(BoardCardAttachments::class);
    }

    public function label() {
        return $this->hasOne(BoardCardLabel::class);
    }

}
