<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\News;
use http\Header\Parser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ParserSeeder;
use PHPUnit\Util\Xml;
use Orchestra\Parser\Xml\Facade as XmlParser;
use DB;

class ParserController extends Controller
{
    public function index()
    {
        $count = Category::query()->count();
        $news = News::query()->where('is_parsed', true)->paginate(6);
        $category = Category::query()->where('id', $count)->get();
        //dump($category);
        if (!isset($category->toArray()[0]['category']) || $count <= 5) {
            return view('admin.parser', ['parser' => $news, 'category' => false]);
        } else {
            return view('admin.parser', ['parser' => $news, 'category' => $category->toArray()[0]['category'] ]);
        }
    }

    public function getParsedNews()
    {
        $count = Category::query()->count();
        News::query()->where('is_parsed', true)->delete();
        if($count <= 5){
            Category::query()->where('id', $count)->delete();
        }
        $news = [];
        $xml = XmlParser::load('https://news.yandex.ru/auto.rss');
        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,link,guid,description,pubDate]']
        ]);
        $title = str_replace(['.', ': '], '_', mb_strtolower($data['title']));
        $title = strtr($title, array('а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'e', 'ж' => 'j', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shch', 'ы' => 'y', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya', 'ъ' => '', 'ь' => ''));


        for ($i = 0; $i < count($data['news']); $i++) {
//            dump($data['news'][$i]['title']);
            $news[] = [
                'heading' => $data['news'][$i]['title'],
                'description' => $data['news'][$i]['description'],
                'isPrivate' => false,
                'category_id' => $count + 1,
                'is_parsed' => true,
            ];
        }

        //dd($count);
        DB::table('categories')->insert([
            'id' => $count + 1,
            'category' => $data['title'],
            'name' => $title,
        ]);
        DB::table('news')->insert($news);

        $news = News::query()->where('is_parsed', true)->paginate(6);
        $category = Category::query()->where('id', $count+1)->get();
        //dd($category->toArray()[0]['category']);
        if (!isset($category->toArray()[0]['category'])) {
            return view('admin.parser', ['parser' => $news, 'category' => false]);
        } else {
            return view('admin.parser', ['parser' => $news, 'category' => $category->toArray()[0]['category'] ]);
        }
    }

}
