<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Name;

class Favorite extends Model
{
    protected $fillable = array('user_id','name_id');
    
    public function names()
    {
        return $this->hasOne('App\Name','id');
    }

}
