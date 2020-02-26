<?php

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    public function getData()
    {
        $faker = Faker\Factory::create('en_EN');
        $data = [];
        for ($i = 0; $i < 10; $i++){
            $data[] = [
                'heading' => $faker->realText(rand(20,50)),
                'description' => $faker->realText(rand(1000,2000)),
                'isPrivate' => false,
                'category_id' => rand(1,5),
                'newsImg' => ""
            ];
        }
        return $data;
    }
}
