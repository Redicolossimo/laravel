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
    public function news(News $news)
    {
        $news = News::query()
            ->where('isPrivate', false)
            ->paginate(6);
        return view('news.all', ['news' => $news]);
    }

    public function categories()
    {
        return view('news.category', [
//                'categories' => Category::query()->select(['id', 'category', 'name'])->get()
                'categories' => Category::all()
            ]
        );
    }

    public function newsOne(News $news)
    {
        return view('news.one', ['news' => $news]);
    }

    public function categoryId(Category $category)
    {
        $news = News::query()
            ->where('category_id', $category->id)
            ->paginate(4);
        $categories = Category::all();

        return view('news.oneCategory', ['category' => $category, 'news' => $news, 'categories' => $categories]);
    }
}
