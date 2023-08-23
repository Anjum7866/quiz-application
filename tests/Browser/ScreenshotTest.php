<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;

class ScreenshotTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testGenerateScreenshot()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/screenshot-form')
                    ->select('browser', 'chrome')
                    ->type('browser_version', 'latest')
                    ->select('resolution', 'fhd')
                    ->type('url', 'https://www.example.com')
                    ->press('Generate Screenshot')
                    ->waitFor('.screenshot-success') // Add a class to display success message in your form
                    ->assertSee('Screenshot generated successfully!');
        });
    }
}
