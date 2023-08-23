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
            $browser->visit('/generate-screenshot')
                    ->select('browser', 'chrome')
                    ->type('browser_version', '92')
                    ->select('resolution', 'HD')
                    ->type('url', 'https://www.example.com')
                    ->press('Generate Screenshot')
                    ->pause(5000) // Add a pause to allow time for screenshot
                    ->assertSee('Screenshot generated successfully');
        });
    }

}
