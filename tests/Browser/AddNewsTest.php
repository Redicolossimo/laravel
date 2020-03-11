<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\News;

class AddNewsTest extends DuskTestCase
{

    use RefreshDatabase;
    /**
     * A Dusk test example.
     *
     * @return void
     */
//    public function test1Example()
//    {
//        $this->browse(function (Browser $browser) {
//            $browser->visit('/admin/addNews')
//                ->type('title', '123')
//                ->type('text', 'test')
//                ->press('Добавить')
//                ->assertPathIs('/admin/addNews');
//        });
//    }
        public function test2Example()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/addNews')
                ->type('heading', '123')
                ->type('description', 'test')
                ->press('Add')
                ->assertSee('The Heading of news must be at least 5 characters.')
                ->assertPathIs('/admin/addNews');
        });
    }

    public function testCreateNews()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/addNews')
                ->type('heading', 'Heading of news')
                ->type('description', 'Text of news')
                ->press('Add')
                ->assertPathIs('/admin/news')
                ->assertSee('Новость успешно добавлена');
        });
    }

    public function testCreateNewsValidation()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/addNews')
                ->press('Add')
                ->assertSee('The Heading of news field is required.')
                ->assertSee('The Text of news field is required.')
                ->type('heading', '123')
                ->type('description', '123')
                ->press('Add')
                ->assertSee('The Heading of news must be at least 5 characters.')
                ->assertDontSee('The Text of news field is required.');
        });
    }
//    public function testEditNews() {
//        $this->browse(function (Browser $browser) {
//            $news = News::query()->find(2);
//            $browser->visit('/admin/updateNews2')
//                ->assertInputValue('heading', $news->heading)
//                ->assertInputValue('description', $news->description)
//                ->assertSelected('category_id', $news->category_id);
//        });
//    }
}
