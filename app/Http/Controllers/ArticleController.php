<?php

namespace App\Http\Controllers;

use App\Actions\ArticleActions;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function show(string $slug_category, string $slug_artiocle) {
        $answer = ArticleActions::show($slug_category, $slug_artiocle);

        return view('blog-single', $answer);
    }
}
