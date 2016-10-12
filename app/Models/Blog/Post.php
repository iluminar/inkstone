<?php

namespace App\Models\Blog;

use App\Models\Blog\Comment;
use App\Models\User;
use App\Models\Blog\Tag;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'title', 'slug', 'content', 'draft', 'publish_time'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getPublishTimeAttribute($value)
    {
        return Carbon::parse($value)->toFormattedDateString();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }
}
