<?php

namespace App\Models;

use Eloquence\Behaviours\CamelCasing;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    use CamelCasing;

    public function members() {
        return $this->hasMany(User::class);
    }

}
