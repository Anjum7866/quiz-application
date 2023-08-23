<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ScreenshotTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @dataProvider screenshotDataProvider
     */
    public function testGenerateScreenshot($browserName, $browserVersion, $resolution, $url)
    {
        $this->browse(function (Browser $browser) use ($browserName, $browserVersion, $resolution, $url) {
            $browser->visit('/generate-screenshot')
                    ->select('browser', $browserName)
                    ->type('browser_version', $browserVersion)
                    ->select('resolution', $resolution)
                    ->type('url', $url)
                    ->press('Generate Screenshot')
                    ->pause(5000) 
                    ->assertSee('Screenshot generated successfully');
        });
    }

    /**
     * Data provider for different screenshot scenarios.
     *
     * @return array
     */
    public function screenshotDataProvider()
    {
        return [
            ['chrome', '92', 'HD', 'https://www.example.com'],
            ['firefox', '90', 'FHD', 'https://www.example2.com'],
            ['edge', '95', 'HD', 'https://www.example3.com'],
            ['safari', '14', 'FHD', 'https://www.example4.com']
        ];
    }
}
