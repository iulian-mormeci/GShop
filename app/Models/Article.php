<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{

    protected $fillable = ['title', 'description', 'price', 'availabiliti'];
    
    //relation tra article e category
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    //relation tra article e size
    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class);
    }

}
