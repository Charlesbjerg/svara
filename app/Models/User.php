<?php

namespace App\Models;

use Eloquence\Behaviours\CamelCasing;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use CamelCasing;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
     * TODO: Remake this with constants
     */
    protected $types = [
        0 => 'staff',
        1 => 'manager',
        2 => 'owner',
        3 => 'client'
    ];

    // Relationships

    public function clients() {
        if ($this->isClient()) {
            return $this->belongsToMany(Client::class);
        }
    }

    public function projects() {
        return $this->belongsToMany(Project::class, 'users_to_projects');
    }

    public function team() {
        if ($this->isStaff()) {
            return $this->belongsTo(Team::class);
        }
    }

    /**
     * TODO: Figure out if this is actually necessary
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company() {
        if ($this->isStaff()) {
            return $this->belongsTo(Company::class);
        }
    }

    // Helpers

    /**
     * Checks if the current user is a client user.
     *
     * @return bool
     */
    public function isClient() {
        return array_search('client', $this->types) === $this->typeId;
    }

    /**
     * Checks if the current user is a staff user.
     * TODO: Can probably find a better approach to this
     *
     * @return bool
     */
    public function isStaff() {
        switch($this->typeId) {
            case 0:
            case 1:
            case 2:
                return true;
            break;
            default:
                return false;
            break;
        }
    }

}
