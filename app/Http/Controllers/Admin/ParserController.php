<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Jobs\NewsParsing;
use App\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XMLParser;
use App\Services\XMLParserService;
use Symfony\Component\DomCrawler\Crawler;
use DB;

class ParserController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        //dd($categories);

        if (!isset($categories)) {
            return view('admin.parser', ['categories' => false]);
        } else {
            return view('admin.parser', ['categories' => $categories]);
        }
    }

    public function getParsedNews(XMLParserService $parserService)
    {
//        $rssLinks = [
//            'https://news.yandex.ru/auto.rss',
//            'https://news.yandex.ru/auto_racing.rss',
//            'https://news.yandex.ru/army.rss',
//            'https://news.yandex.ru/world.rss',
//            'https://news.yandex.ru/gadgets.rss',
//            'https://news.yandex.ru/index.rss',
//            'https://news.yandex.ru/martial_arts.rss',
//            'https://news.yandex.ru/communal.rss',
//            'https://news.yandex.ru/health.rss',
//            'https://news.yandex.ru/games.rss',
//            'https://news.yandex.ru/internet.rss',
//            'https://news.yandex.ru/cyber_sport.rss',
//            'https://news.yandex.ru/movies.rss',
//            'https://news.yandex.ru/cosmos.rss',
//            'https://news.yandex.ru/culture.rss',
//            'https://news.yandex.ru/music.rss',
//            'https://news.yandex.ru/science.rss',
//            'https://news.yandex.ru/realty.rss',
//            'https://news.yandex.ru/society.rss',
//            'https://news.yandex.ru/politics.rss',
//            'https://news.yandex.ru/incident.rss',
//            'https://news.yandex.ru/travels.rss',
//            'https://news.yandex.ru/sport.rss',
//            'https://news.yandex.ru/theaters.rss',
//            'https://news.yandex.ru/computers.rss',
//            'https://news.yandex.ru/vehicle.rss',
//            'https://news.yandex.ru/finances.rss',
//            'https://news.yandex.ru/showbusiness.rss',
//            'https://news.yandex.ru/ecology.rss',
//            'https://news.yandex.ru/business.rss',
//            'https://news.yandex.ru/energy.rss'
//        ];
        $rssLinks = DB::table('resources')->get();
        //dd($rssLinks);
        foreach ($rssLinks as $link) {
            NewsParsing::dispatch($link->link);
            //для отладки
            //dd($link->link);
           //$this->saveParsedNews($link->link);
        }

        $categories = Category::all();
        $news = News::all();
        //dd($news);
        if (!isset($categories)) {
            return view('admin.parser', ['categories' => false]);
        } else {
            return view('admin.parser', ['categories' => $categories, 'news'=> $news]);
        }
    }
    //для отладки
//    public function saveParsedNews($link)
//    {
//        //dd($link);
//        $xml = XMLParser::load($link);
//
//        $data = $xml->parse([
//            'category' => ['uses' => 'channel.title'],
//            'news' => ['uses' => 'channel.item[title,link,description]']
//        ]);
//        //dd($data);
//        $this->news($data);
//    }
//    private function news($data) {
//        //dd($data);
//        $newCategory = $data['category'];
//
//        $category = Category::query()
//            ->where('category', $newCategory)
//            ->first();
//
//        if (!$category) {
//            $category = new Category([
//                'category' => $newCategory,
//                'name' => \Str::slug($newCategory),
//            ]);
//            $category->save();
//        }
//        $news = [];
//        foreach ($data['news'] as $item){
//            // Тут рабочий грабер картинок к новостя, но в ленте яндекса у каждой новости своя версткаб выдернутая из
//            // источника, вобщем ничего не вышло, но картинки я некотрые получал не из рсс яндекса, он их не дает
//            // а из новости самой. потому отказался от этой идеи нужно что то более постоянное XD или выдирать вообще
//            // все картинки
////            $link_ = $item['link'];
////            $html = file_get_contents($link_);
////            $crawler = New Crawler(null, $link_);
////            $crawler->addHtmlContent($html, 'UTF-8');
////            $images = $crawler->filter('img > .image')->each(function (Crawler $node, $i) {
////                return $node->image()->getUri();
////            });
////            $videoPreview = $crawler->filter('a > .news-media-stack__photo')->each(function (Crawler $node, $i) {
////                return $node->image()->getUri();
////            });
//            $newsBuffer = News::query()
//                ->where('heading', $item['title'])
//                ->first();
//            if (!$newsBuffer) {
//                $news[] = [
//                    'heading' => $item['title'],
//                    'description' => $item['description'],
//                    'category_id' => $category->id,
//                    //'newsImg' =>  isset($images) ? $images : '',
//                    'is_parsed' => true,
//                ];
//
//            }
//        }
//        //dd($news);
//        News::query()->insert($news);
//    }
}
