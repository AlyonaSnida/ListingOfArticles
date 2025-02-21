<?php

namespace App\Actions;

use App\Helpers\Traits\SlugTrait;
use App\Models\Article;
use App\Models\Category;

class ArticleActions
{
    use SlugTrait;

    static public function getArticlesWithImage(int $limit) {
        return Article::all()->filter(function ($article) {
            return !empty($article->images);
        })->values()->take($limit);
    }

    static public function getAllArticles(int $limit) {
        return Article::paginate($limit);
    }

    static public function create(
        string $title,
        string $description,
        int $category_id,
        ?array $images = [],
    ): Article {
        return Article::firstOrCreate([
            'title' => $title,
            'slug' => self::makeSlug(mb_strtolower($title)),
            'description' => $description,
            'category_id' => $category_id,
            'images' => $images,
        ]);
    }

    static public function show(string $slug_category, string $slug_artiocle): array
    {
        $main_category = Category::with(['articles' => function ($query) use ($slug_artiocle) {
            $query->where('slug', $slug_artiocle);
        }])->where('slug', $slug_category)->firstOrFail();

        $all_categories = Category::withCount('articles')->get();

        return [
            'article_title' => $main_category->articles->first()->title,
            'article_slug' => $main_category->articles->first()->slug,
            'article_description' => $main_category->articles->first()->description,
            'article_images' => $main_category->articles->first()->images,
            'article_date_creation' => $main_category->articles->first()->created_at->format('F d, Y'),
            'categories_info' => $all_categories,
            'category_name' => $main_category->name,
        ];
    }
}
