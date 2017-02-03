<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RepoPage extends Model
{
    protected $table = 'repo_pages';

    protected $fillable = ['user_id', 'repo_id', 'name', 'slug', 'content', 'parent', 'publish_time'];
}
