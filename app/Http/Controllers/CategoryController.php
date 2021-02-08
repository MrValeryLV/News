<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::query()->get();

        return view('news.categories', [
            'categories' => $categories,
        ]);
    }

    public function show($slug) {

        $category = Category::query()->where('slug', $slug)->first();

        $news = News::query()->where('category_id', $category->id)->get();

        return view('news.category', [
            'news' => $news,
            'category' => $category
        ]);
    }
}
