<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class NewsEditController extends Controller
{
    public function index() {

        $news = News::all();

        return view('admin.index',
        [
            'news' => $news,
        ]);
    }

    public function create(Request $request) {

        if ($request->isMethod('post')) {

            $url = null;
            if ($request->file('image')) {
                $path = Storage::putFile('public', $request->file('image'));
                $url = Storage::url($path);
            }

            $this->validate($request, News::rules(), [], News::attributeNames());

            $news = new News();
            $news->image = $url;

            $news->fill($request->except('image'))->save();

//DB
//            $id = DB::table('news')->insertGetId([
//                'title' => $request->title,
//                'text' => $request->text,
//                'image' => $url,
//                'isPrivate' => isset($request->isPrivate),
//                ]);
//файл
//            $data = News::getNews();
//
//            $addData = $request->except('_token');
//
//            $data[] = $addData;
//
//            $id = array_key_last($data);
//
//            $data[$id]['isPrivate'] = isset($addData['isPrivate']);
//            $data[$id]['id'] = $id;
//            $data[$id]['image'] = $url;
//
//            File::put(storage_path() . '/news.json' , json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

            //return redirect()->route('news.show', news->id)->with('success', 'Новость добавлена!');
            return redirect()->route('news.show', $news->id)->with('success', 'Новость добавлена!');
        }

        return view('admin.create', [
            'categories' => Category::all(),
            'news' => new News()
        ]);
    }

    public function edit(News $news) {
        return view('admin.create', [
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, News $news) {
        $url = null;
        // dd($request->image);
        if ($request->file('image')) {
            $path = \Storage::putFile('public', $request->file('image'));
            $url = Storage::url($path);
        }

        $this->validate($request, News::rules(), [], News::attributeNames());

        $news->image = $url;

        $news->fill($request->except('image'))->save();

        return redirect()->route('news.show', $news->id)->with('success', 'Новость изменена!');
    }

    public function destroy(News $news) {
        $news->delete();
        return redirect()->route('admin.index')->with('success', 'Новость успешно удалена');
    }
}
