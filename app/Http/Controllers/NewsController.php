<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $news = [
        [
            'heading' => 'News 1',
            'newsImg' => 'http://placehold.it/150',
            'description' => 'Detail description'
        ],
        [
            'heading' => 'News 2',
            'newsImg' => 'http://placehold.it/150',
            'description' => 'Detail description'
        ],
        [
            'heading' => 'News 3',
            'newsImg' => 'http://placehold.it/150',
            'description' => 'Detail description'
        ],
        [
            'heading' => 'News 4',
            'newsImg' => 'http://placehold.it/150',
            'description' => 'Detail description'
        ]
    ];
    private $categoriesArr = [
        'Daily News',
        'Culture',
        'Sport',
        'Politics',
        'World'
    ];

    public function index() {
        return view('news', ['news' => $this->news, 'page' => 'news']);
    }
    public function getOne($id) {
        if (isset($this->news[$id])) {
            return view('singleNews', ['news' => $this->news[$id], 'page' => 'news']);
        }
        return redirect('/news');
    }

    public function categories(){
        return view('categories',
            ['categories' => $this->categoriesArr, 'page' => 'categories']
        );
    }

    public function getCategory($id = null) {
        if (isset($this->categoriesArr[$id])) {
            return view('news',
                [
                    'category' => $this->categoriesArr[$id],
                    'news' => $this->news,
                    'page' => 'categories'
                ]
            );
        }
        return redirect('/categories');
    }
}
