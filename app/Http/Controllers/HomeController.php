<?php

namespace App\Http\Controllers;

use App\Actions\CategoryActions;
use App\Actions\ArticleActions;

class HomeController extends Controller
{
    public function getHomePage() {
        return view(
            'index',
            [
                'first_articles' => ArticleActions::getArticlesWithImage(3),
                'categories_info' => CategoryActions::getAllCategories(),
                'articles' => ArticleActions::getAllArticles(6),
            ],
        );
    }

}
