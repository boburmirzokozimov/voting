<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Idea extends CustomModel
{
    use Sluggable;


    protected $table = 'ideas';

    public function path(): string
    {
        return '/ideas/' . $this->slug;
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function addComment(array $validated)
    {
        return $this->comments()->create($validated);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->latest();
    }

    public function addVote(int $id): void
    {
        $this->votes()->attach($id);
    }

    public function votes(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_vote')->withTimestamps();
    }
}
