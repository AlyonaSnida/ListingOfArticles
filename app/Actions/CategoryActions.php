<?php

namespace App\Actions;

use App\Helpers\Traits\SlugTrait;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryActions
{
    use SlugTrait;

    static public function getAllCategories(): Collection
    {
        return Category::withCount('articles')->get();
    }

    static public function create(string $name): Category
    {
        return Category::firstOrCreate([
            'name' => $name,
            'slug' => self::makeSlug(mb_strtolower($name)),
        ]);
    }

    static public function show(string $slug, int $limit): array
    {
        $main_category = Category::where('slug', $slug)->firstOrFail();

        $all_categories = Category::withCount('articles')->get();

        return [
            'articles' => $main_category->articles()->paginate($limit),
            'main_category' => $main_category,
            'categories_info' => $all_categories,
        ];
    }
}
