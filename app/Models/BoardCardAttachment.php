<?php

namespace App\Models;

use Eloquence\Behaviours\CamelCasing;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardCardAttachment extends Model
{
    use HasFactory;
    use CamelCasing;

    protected $fillable = ['name'];

    public function card() {
        return $this->belongsTo(BoardCard::class);
    }

}
