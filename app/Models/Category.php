<?php

namespace App\Models;

use App\Helpers\Traits\SlugTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory, SlugTrait;

    protected $fillable = [
        'name',
        'slug',
    ];

    protected $hidden = [];

    protected $casts = [];

    public $timestamps = true;

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
