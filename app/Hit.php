<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hit extends Model
{
    protected $fillable = array('name_id');
    //public $timestamps =false;
    //
    public function names() {
         return $this->belongsTo('App\Name','name_id');
    }
    public function hits($name_id)
    {
        return;
    }


    /*public static function hit($name_id) {
    {
        //Hit::save(['names_id',$name_id]);
    } */
    
}
