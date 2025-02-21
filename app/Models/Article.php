<?php

namespace App\Models;

use App\Helpers\Traits\SlugTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory, SlugTrait;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'category_id',
        'images',
    ];

    protected $hidden = [];

    protected $casts = [
        'images' => 'array',
    ];

    public $timestamps = true;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
