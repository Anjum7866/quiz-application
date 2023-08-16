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
            $browser->visit('/dusk')
            ->assertSeeIn('h1','Welcome to Laravel Dusk Responsive Test');                 
        });
    }
    public function testScreenshot(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/dusk')
            ->screenshot('homepage_screenshot') 
            ->storeConsoleLog('console_output')
            ->assertSeeIn('h1','Welcome to Laravel Dusk Responsive Test');                   
        });
    }
    
    public function testResponsiveDesign()
    {
        $this->browse(function (Browser $browser) {
            $browser->resize(1024, 768);

            $browser->visit('/dusk')
                     ->assertSeeIn('h1','Welcome to Laravel Dusk Responsive Test')
                    ->assertVisible('@navigation'); 
        });
    }
   
    public function testScrollToElement()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/dusk')
                    ->scrollToElement('@navigation') // Replace with your element's selector
                    ->assertSeeIn('h1', 'Welcome to Laravel Dusk Responsive Test');
        });
    }



}
