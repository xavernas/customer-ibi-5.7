<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRegion extends Model
{
    protected $table = 'user_regions';
    protected $fillable = [
        'user_id','region_id'
    ];

}
