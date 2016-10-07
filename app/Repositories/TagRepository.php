<?php

namespace App\Repositories;

use App\Models\Tag;
use Carbon\Carbon;
use Rinvex\Repository\Repositories\EloquentRepository;

class TagRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.tag';
    protected $model = 'App\Models\Tag';

    public function createTagsAndReturnIds($tags)
    {
        $existingTags = $this->getExistingTagsName($tags);
        Tag::insert($this->getNewTags($tags, $existingTags));

        return $this->getTagsByName($tags->toArray());
    }

    public function getExistingTagsName($tags)
    {
        return Tag::whereIn('name', $tags->toArray())->pluck('name');
    }

    public function getNewTags($tags, $existingTags)
    {
        $now = Carbon::now();
        return $tags->reject(function ($value, $key) use($existingTags) {
            return $existingTags->contains($value);
        })->setKey('name')->addToItem(['created_at' => $now, 'updated_at' => $now])->toArray();
    }

    public function getTagsByName($tags)
    {
        return Tag::whereIn('name', $tags)->get();
    }
}
