<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Social;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function socials()
    {
        return $this->hasMany(Social::class);
    }

    public function github()
    {
        return $this->hasMany(Social::class)->where('provider', '=', 'github')->first();
    }

    public function twitter()
    {
        return $this->hasMany(Social::class)->where('provider', '=', 'twitter')->first();
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id');
    }

    /**
     * Get the value of the model's route key.
     *
     * @return mixed
     */
    public function getRouteKey()
    {
        return $this->username;
    }
}
