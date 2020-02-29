<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public $timestamps = false;

    protected $fillable = ['heading', 'description', 'category_id', 'isPrivate' ];

    public  function category() {
        return $this->belongsTo(Category::class, 'category_id')->first();
    }
}
