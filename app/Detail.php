<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $fillable = array('name_id','title','content');
    //
    public function names() {
        return $this->belongsTo('App\Name','name_id');
    }
}
