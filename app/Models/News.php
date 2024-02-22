<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'content',
        'image',
        'author',
        'published_date',
        'slug',
        'category_id',
        'count',
    ];

    public function category():BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function comments():HasMany{
        return $this->hasMany(Comment::class);
    }
}
