<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyFavoriteHit extends Model
{
    protected $fillable = array('name_id','count');
}
