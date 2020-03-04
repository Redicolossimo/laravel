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

    public function update(Request $request, News $news)
    {

        return view('admin.addNews', [
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    public function save(Request $request, News $news)
    {
        if ($request->isMethod('post')) {
            if ($request->file('newsImg')) {
                $path = Storage::putFile('public', $request->file('newsImg'));
                $news->newsImg = Storage::url($path);;
            }
            $this->validate($request, News::rules(), [], News::attributeNames());
            $result = $news->fill($request->all())->save();

            if ($result) {
                return redirect()
                    ->route('admin.news')
                    ->with('success', 'Новость успешно изменена!');
            } else {
                return redirect()
                    ->route('admin.addNews')
                    ->with('error', 'Ошибка изменения новости!');
            }
        }
    }

    public function delete(News $news)
    {

        $news->delete();
        return redirect()
            ->route('admin.news')
            ->with('success', 'Новость успешно удалена!');
    }

    public function add(Request $request, News $news)
    {
        if ($request->isMethod('post')) {
            $request->flash();

            $url = null;
            //$news = new News();

            if ($request->file('newsImg')) {

                $path = $request->file('newsImg')
                    ->store('public');
                $news->newsImg = Storage::url($path);
            }
            $this->validate($request, News::rules(), [], News::attributeNames());
            $result = $news->fill($request->all())->save();
            if($result) {
                return redirect()
                    ->route('admin.news')
                    ->with('success', 'Новость успешно создана!');
            } else {
                return redirect()
                    ->route('admin.addNews')
                    ->with('error', 'При создании новости что то пошло не так!');
            }
        }

        return view('admin.addNews', [
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

}
