<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\News;
use \Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage, DB;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()->paginate(8);
        return view('admin.admin', ['news' => $news]);
    }

    public function edit(News $news)
    {
        return view('admin.addNews', [
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, News $news)
    {
        $result = $this->saveData($request, $news);
        return $this->makeMessage('News successfully changed', 'News changing error!', $result);
    }

    public function destroy($id)
    {
        News::destroy($id);
        return response()->json([
            'id' => $id,
            'message' => 'News successfully deleted!',
        ]);
//        return redirect()
//            ->route('admin.news.index')
//            ->with('success', 'News successfully deleted!');

    }

    public function store(Request $request)
    {
        $result = $this->saveData($request, new News());
        return $this->makeMessage('News successfully added', 'Creation error!!!', $result);
    }

    public function create(News $news)
    {
        return view('admin.addNews', [
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    private function saveData(Request $request, News $news)
    {
        if ($request->file('newsImg')) {
            $path = $request->file('newsImg')
                ->store('public');
            $news->newsImg = Storage::url($path);
        }
        $this->validate($request, News::rules(), [], News::attributeNames());
        $news->fill($request->all())->save();
        return $news;
    }

    private function makeMessage($msg, $errMsg, $result)
    {
        if ($result) {
            return redirect()
                ->route('admin.news.index')
                ->with('success', $msg);
        } else {
            return redirect()
                ->route('admin.news.create')
                ->with('error', $errMsg);
        }
    }

}
