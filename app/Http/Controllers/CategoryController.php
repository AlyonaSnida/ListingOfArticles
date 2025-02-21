<?php

namespace App\Http\Controllers;

use App\Actions\CategoryActions;
use App\Http\Requests\GetCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(string $slug, GetCategoryRequest $request)
    {
        $data = $request->validated();
        $limit = $data['limit'] ?? 3;
        $answer = CategoryActions::show($slug, $limit);

        return view('category', $answer);
    }
}
