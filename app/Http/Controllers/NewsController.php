<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class NewsController extends Controller
{
    public function news()
    {
        $news = DB::table('news')->get();
        return view('news.all', ['news' => $news]);
    }

    public function categories()
    {
        $categories = DB::table('categories')->get();
        return view('news.category', ['categories' => $categories]);
    }

    public function newsOne($id)
    {
        $news = DB::table('news')->find($id);

        if (!empty($news)) {
            return view('news.one', ['news' => $news]);
        } else
            return redirect(route('news.all'));

    }

    public function categoryId($id)
    {

        $newsAll = DB::table('news')->get();
        $categories = DB::table('categories')->get();
//        $ids = DB::table('categories')->;

        foreach ($categories as $item) {
            $ids[] = $item->id;
            if ($item->name == $id) $id = $item->id;
        }

        if ($id) {
            $name = $categories[$id - 1]->category;
            foreach ($newsAll as $item) {
                if ($item->category_id === $id) {
                    $news[] = $item;
                }
            }

            return view('news.oneCategory', ['news' => $news, 'category' => $name, 'categories' => $categories]);
        } else
            return redirect(route('news.categories'));

    }

    public function addNews(Request $request)
    {

        if ($request->isMethod('post')) {
            //$request->flash();

            $url = null;
            if ($request->file('newsImg')) {
                $path = Storage::putFile('public', $request->file('newsImg'));
                $url = Storage::url($path);
            }

            DB::table('news')->insert([
                'heading' => $request->heading,
                'description' => $request->description,
                'newsImg' => $url,
                'category_id' => $request->category,
                'isPrivate' => isset($request->isPrivate)
            ]);

            return redirect()->route('news.all')->with('success', 'Новость успешно добавлена');
        }
        $categories = DB::table('categories')->get();
        return view('news.addNews', ['categories' => $categories]);
    }
}
