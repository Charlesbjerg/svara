<?php

namespace App\Models;

use Eloquence\Behaviours\CamelCasing;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectSignoffTemplate extends Model
{
    use HasFactory, CamelCasing;

    public $timestamps = false;
    public $fillable = ['name', 'message'];

}
