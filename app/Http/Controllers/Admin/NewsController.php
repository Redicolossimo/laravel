<?php

namespace App\Http\Controllers\Admin;
use App\Category;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage, DB;

class NewsController extends Controller
{
    public function all()
    {
        $news = News::query()
            ->paginate(6);

        return view('admin.admin', ['news' => $news]);

    }

    public function update(Request $request, News $news) {

        return view('admin.addNews', [
            'news' => $news,
            'categories' => Category::query()->select(['id','category'])->get()
        ]);
    }

    public function save(Request $request, News $news) {
        if ($request->isMethod('post')) {
            if ($request->file('newsImg')) {
                $path = Storage::putFile('public', $request->file('newsImg'));
                $url = Storage::url($path);
                $news->newsImg = $url;
            }

            $news->fill($request->all());
            $news->save();
            return redirect()->route('admin.news')->with('success', 'Новость успешно изменена!');
        }
    }

    public function delete(News $news) {

        $news->delete();
        return redirect()->route('admin.news')->with('success', 'Новость успешно удалена!');
    }

    public function add(Request $request, News $news)
    {
        // dump($news);
        if ($request->isMethod('post')) {
            //$request->flash();

            $url = null;
            $news = new News();

            if ($request->file('newsImg')) {
                //$path = Storage::putFile('public', $request->file('image'));
                //$url = Storage::url($path);
                $path = $request->file('newsImg')->store('public');
                $news->newsImg = Storage::url($path);
            }

            $news->fill($request->all());
            $news->save();

            return redirect()->route('admin.news')->with('success', 'Новость успешно создана!');
        }

        return view('admin.addNews', [
            'news' => $news,
            'categories' => Category::query()->select(['id','category'])->get()
        ]);
    }

}
