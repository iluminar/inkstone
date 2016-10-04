<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id', 'post_id', 'content', 'parent_id', 'status'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
