<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }

    public function getData()
    {
        $data = [
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

        return $data;
    }
}
