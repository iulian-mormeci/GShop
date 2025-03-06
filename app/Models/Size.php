<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Size extends Model
{
    protected $fillable = ['name'];

    //relation tra size e article
    public function article(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
