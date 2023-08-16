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
            $browser->visit('/');
            // ->assertSeeIn('h3','E-learning is a better way of learning'); 
        });
    }
    public function testScreenshot(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
            ->screenshot('homepage_screenshot') 
            ->storeConsoleLog('console_output');
            // ->assertSeeIn('h3','E-learning is a better way of learning'); 
        });
    }
    public function testFormSubmission()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/contact')
                    ->type('name', 'John Doe')
                    ->type('email', 'john@example.com')
                    ->type('password', 'password')
                    ->type('password_confirmation', 'password')
                    ->select('role', 'admin')
                    ->press('Create Admin User'); 
        });
    }
    public function testCreateAdminUser()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admins')
                    ->type('name', 'John Doe')
                    ->type('email', 'john@example.com')
                    ->type('password', 'password')
                    ->type('password_confirmation', 'password')
                    ->select('role', 'admin')
                    ->press('Create Admin User'); 
        });
    }

}
