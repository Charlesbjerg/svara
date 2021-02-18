<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    use \Eloquence\Behaviours\CamelCasing;

    public function projects() {
        return $this->hasMany(Project::class);
    }

    public function mainContact() {
        return $this->hasOne(User::class);
    }

    // TODO: Need a method for setting the main contact
    // Have to make sure it has the right user type

}
