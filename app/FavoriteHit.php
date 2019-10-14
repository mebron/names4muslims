<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavoriteHit extends Model
{
    protected $table = 'favorite_hits';
    protected $fillable =['name_id','hits'];
    public function names()
    {
        return $this->belongsTo('App\Name','name_id');
    }
}
