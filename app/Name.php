<?php

namespace App;

//use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Redis;
use App\Favorite;

class Name extends Model {

    //use Searchable;
    use SoftDeletes;
    use Sluggable;
    protected $table = 'names';
    protected $fillable = ['name', 'gender', 'meaning', 'arabic', 'category', 'origin', 'root', 'slug', 'alternate', 'user_id', 'verified', 'active', 'title', 'meta_description'];

    //
    public function details() {
        return $this->hasMany('App\Detail');
    }

    public function translations() {
        return $this->hasMany('App\Translation');
    }
    public function galleries() {
        return $this->hasMany('App\Gallery');
    }

    public function favoriteHit() {
        return $this->hasOne('App\FavoriteHit');
    }

    Public function users() {
        return $this->hasOne('App\User', 'id');
    }

    public function fusers() {
        return $this->belongsToMany('App\User', 'favorites');
    }
    public function ratings (){
        return $this->hasOne('App\NameRating');
    }
    public function searchableAs() {
        return 'names_index';
    }
    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return [
        'id' => $this->id,
        'name' => $this->name,
        'meaning' => $this->meaning];
    }
    public function favorited()
    {
        return (bool) Favorite::where('user_id', Auth::id())
        ->where('name_id', $this->id)
        ->first();
    }
    // Set the verified status to true and make the email token null
    public function verified()
    {
       $this->verified = 1;
       $this->save();
    }
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function visits()
    {
        return visits($this);
    }
}
