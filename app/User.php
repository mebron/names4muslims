<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'provider', 'provider_id', 'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function names()
    {
        return $this->hasMany('App\Name');
    }
    public function entries() {
     // you need to specify the pivot table, since eloquent would search for entry_user as default
        return $this->belongsToMany('App\Name', 'favorites')->withTimestamps();
    }
    public function favorites()
    {
        return $this->belongsToMany('App\Name', 'favorites')->withTimestamps();
    }
    /**
     * Social Accounts
     */
    public function socialAccounts() {
        return $this->hasMany('App\SocialAccount');
    }
}
