<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\DomCrawler\Crawler;

class News extends Model
{
    public $timestamps = false;

    protected $fillable = ['heading', 'description', 'category_id', 'isPrivate'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->first();
    }

    public static function rules()
    {
        $newsCategory = (new Category())->getTable();
        return [
            'heading' => 'required|min:5|max:50',
            'description' => 'required|max:5000',
            'category_id' => "required|exists:{$newsCategory},id",
            'newsImg' => 'mimes:jpeg,bmp,png,gif|max:1000',
        ];
    }

    public static function attributeNames()
    {
        return [
            'heading' => 'Heading of news',
            'description' => 'Text of news',
            'category_id' => "News category",
            'newsImg' => "Image of news"
        ];
    }
}
