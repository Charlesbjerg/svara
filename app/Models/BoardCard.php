<?php

namespace App\Models;

use Eloquence\Behaviours\CamelCasing;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardCard extends Model
{
    use HasFactory;
    use CamelCasing;

    protected $fillable = ['name', 'description'];

    public function column() {
        return $this->belongsTo(BoardColumn::class);
    }

    /**
     * Depends on column relationship to fetch the board this card
     * belongs to.
     * @return mixed
     */
    public function board() {
        return $this->column()->board;
    }

    public function assignedUser() {
        return $this->hasOne(User::class, 'id', 'assigned_user_id');
    }

    public function attachments() {
        return $this->hasMany(BoardCardAttachment::class);
    }

    public function messages() {
        return $this->hasMany(BoardCardAttachment::class);
    }

    public function label() {
        return $this->hasOne(BoardCardLabel::class);
    }

}
