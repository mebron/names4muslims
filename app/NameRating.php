<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NameRating extends Model
{
    public function names()
    {
        return $this->belongsTo('App\Name','name_id');
    }
}
