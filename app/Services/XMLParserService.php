<?php


namespace App\Services;


use App\Category;
use App\News;
use DB;
use Orchestra\Parser\Xml\Facade as XMLParser;
//use Symfony\Component\DomCrawler\Crawler;

class XMLParserService
{
    public function saveParsedNews($link)
    {
        //dd($link);
        $xml = XMLParser::load($link);

        $data = $xml->parse([
            'category' => ['uses' => 'channel.title'],
            'news' => ['uses' => 'channel.item[title,link,description]']
        ]);
        //dd($data);
        $this->news($data);
    }
    private function news($data) {
        //dd($data);
        $newCategory = $data['category'];

        $category = Category::firstOrCreate([
            'category' => $newCategory,
            'name' => \Str::slug($newCategory),
        ]);

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
        $news = [];
        foreach ($data['news'] as $item){
            // Тут рабочий грабер картинок к новостя, но в ленте яндекса у каждой новости своя версткаб выдернутая из
            // источника, вобщем ничего не вышло, но картинки я некотрые получал не из рсс яндекса, он их не дает
            // а из новости самой. потому отказался от этой идеи нужно что то более постоянное XD или выдирать вообще
            // все картинки
//            $link_ = $item['link'];
//            $html = file_get_contents($link_);
//            $crawler = New Crawler(null, $link_);
//            $crawler->addHtmlContent($html, 'UTF-8');
//            $images = $crawler->filter('img > .image')->each(function (Crawler $node, $i) {
//                return $node->image()->getUri();
//            });
//            $videoPreview = $crawler->filter('a > .news-media-stack__photo')->each(function (Crawler $node, $i) {
//                return $node->image()->getUri();
//            });
            $newsBuffer = News::query()
                ->where('heading', $item['title'])
                ->first();
            if (!$newsBuffer) {
                $news[] = [
                    'heading' => $item['title'],
                    'description' => $item['description'],
                    'category_id' => $category->id,
                    //'newsImg' =>  isset($images) ? $images : '',
                    'is_parsed' => true,
                ];
            }
        }
        //dd($news);
        News::query()->insert($news);
    }
}
