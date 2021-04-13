<?php

namespace App\Models;

use Eloquence\Behaviours\CamelCasing;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    use CamelCasing;

    public $timestamps = false;
    public $guarded = ['account_manager_id'];

    public function projects() {
        return $this->hasMany(Project::class);
    }

    public function members() {
        return $this->belongsToMany(User::class, 'users_to_clients', 'client_id');
    }

    public function mainContact() {
        return $this->hasOne(User::class, 'id', 'main_contact_id');
    }

    public function accountManager() {
        return $this->hasOne(User::class, 'id', 'account_manager_id');
    }

    // TODO: Need a method for setting the main contact
    // Have to make sure it has the right user type

}
