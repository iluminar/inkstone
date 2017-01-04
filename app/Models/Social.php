<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'nickname', 'email', 'provider', 'provider_id', 'user_id', 'avatar'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
