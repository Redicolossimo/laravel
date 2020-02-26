<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;
use Illuminate\Http\Resources\Json;

class News extends Model
{
    public static $news = [
        '1' => [
            'id' => 1,
            'heading' => 'Sport news 1',
            'description' => 'Detail description',
            'newsImg' => 'http://placehold.it/150',
            'category_id' => 5,
            'isPrivate' => false
        ],
        '2' => [
            'id' => 2,
            'heading' => 'Sport news 2',
            'description' => 'Detail description',
            'newsImg' => 'http://placehold.it/150',
            'category_id' => 5,
            'isPrivate' => false
        ],
        '3' => [
            'id' => 3,
            'heading' => 'Politic news 1',
            'description' => 'Detail description',
            'newsImg' => 'http://placehold.it/150',
            'category_id' => 2,
            'isPrivate' => false
        ],
        '4' => [
            'id' => 4,
            'heading' => 'Politic news 2',
            'description' => 'Detail description',
            'newsImg' => 'http://placehold.it/150',
            'category_id' => 2,
            'isPrivate' => false
        ],
    ];
    public static $category = [
        '1' => [
            'id' => 1,
            'category' => 'Daily News',
            'name' => 'daily-news'
        ],
        '2' => [
            'id' => 2,
            'category' => 'Politics',
            'name' => 'politics'
        ],
        '3' => [
            'id' => 3,
            'category' => 'Culture',
            'name' => 'culture'
        ],
        '4' => [
            'id' => 4,
            'category' => 'World',
            'name' => 'world'
        ],
        '5' => [
            'id' => 5,
            'category' => 'Sport',
            'name' => 'sport'
        ]
    ];

    public static function getNews()
    {
        return json_decode(Storage::disk('local')->get('news.json'), true);
    }

    public static function getCategories()
    {
        return json_decode(Storage::disk('local')->get('category.json'), true);
    }


    public static function insert($data)
    {
        $newsArr = News::getNews();
        foreach ($data as $prop) {
            if ($prop == null) {
                return false;
            }
        }
        if (!isset($news['isPrivate'])) {
            $data['isPrivate'] = false;
        }
        $data['newsImg'] = 'http://placehold.it/150';
        $data['id'] = count($newsArr) + 1;
        $newsArr[] = $data;

        $data = json_encode($newsArr, JSON_UNESCAPED_UNICODE);
        Storage::disk('public')->put('DB/news.json', $data);
        return true;
    }
}
