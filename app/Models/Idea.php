<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Idea extends CustomModel
{
    protected $table = 'ideas';

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function path(): string
    {
        return '/ideas/' . $this->id;
    }
}
