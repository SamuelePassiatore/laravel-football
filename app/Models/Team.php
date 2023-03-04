<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = ['name', 'short_name', 'description', 'goal_difference', 'points', 'serie', 'city', 'logo'];
}
