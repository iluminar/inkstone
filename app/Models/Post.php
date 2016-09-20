<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'title', 'slug', 'content', 'draft', 'publish_time'
    ];

    public function Author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
