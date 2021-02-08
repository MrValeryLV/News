<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\News;
use App\Models\News;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index() {
        //return view('news.index')->with('news', News::getNews());
        //$news = DB::table('news')->get();

        //$news = News::all();

        //$news = News::query()->where('isPrivate', false)->first();
        //$news = News::query()->where('isPrivate', false)->get();
        //пагинация
        $news = News::query()->paginate(4);

        return view('news.index')->with('news', $news);
    }

    public function show(News $news) {
         //return view('news.One')->with('news', News::getNewsId($id));
        //$news = DB::table('news')->find($id);

        return view('news.one')->with('news', $news);
    }


}
