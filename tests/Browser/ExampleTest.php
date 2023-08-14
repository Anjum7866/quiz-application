<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     */
    public function testBasicExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
            ->screenshot('homepage_screenshot') 
            ->storeConsoleLog('console_output');
            // ->assertSeeIn('h3','E-learning is a better way of learning'); 
        });
    }
}
