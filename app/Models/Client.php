<?php

namespace App\Models;

use Eloquence\Behaviours\CamelCasing;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    use CamelCasing;

    public function projects() {
        return $this->hasMany(Project::class);
    }

    public function members() {
        return $this->hasMany(User::class);
    }

    // TODO: Need a method for setting the main contact
    // Have to make sure it has the right user type

}
