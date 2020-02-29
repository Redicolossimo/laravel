<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class NewsController extends Controller
{
    public function news()
    {
        $news = News::query()
            ->where('isPrivate', false)
            ->paginate(6);
        return view('news.all', ['news' => $news]);
    }

    public function categories()
    {
        return view('news.category', [
                'categories' => Category::query()->select(['id', 'category', 'name'])->get()
            ]
        );
    }

    public function newsOne(News $news)
    {
        return view('news.one', ['news' => $news]);
    }

    public function categoryId(Category $category)
    {

        $cat = Category::query()->select(['id', 'category'])->where('name', $id)->get();
        /*
                $news = News::query()
                    ->where('category_id', $cat[0]->id)
                    ->paginate(5);
        */
        $news = Category::query()->find($cat[0]->id)->news()->paginate(5);

        return view('news.oneCategory', ['news' => $news, 'category' => $cat[0]->category]);

    }
}
