<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
      'message',
        'name',
        'email',
        'website',
        'news_id',
    ];

    public function news():BelongsTo{
        return $this->belongsTo(News::class);
    }
}
