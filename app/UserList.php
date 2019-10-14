<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class UserList extends Model
{
	use Sluggable;
    public function lists()
    {
        return $this->belongsToMany('App\Name', 'user_list_names'); 
    }
    Public function users() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['title','user_id']
            ]
        ];
    }
}
