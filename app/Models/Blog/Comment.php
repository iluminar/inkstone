<?php

namespace App\Models\Blog;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id', 'post_id', 'content', 'parent_id', 'status'
    ];
    protected $dates = ['created_at'];
    protected $dateFormat = 'Y-m-d H:i:s';

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::now()->diffForHumans(Carbon::parse($value), true);
    }
}
