<?php
namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CrossBrowserTest extends DuskTestCase
{
    public function testResponsiveDesignOnBrowsers()
    {
        $browsers = ['chrome', 'firefox', 'edge', 'safari', 'opera', 'brave'];

        foreach ($browsers as $browserType) {
            $this->browse(function (Browser $browser) use ($browserType) {
                $browser->driver->manage()->deleteAllCookies();
                $this->runResponsivewithScreenshotTest($browser, $browserType);
            });
        }
    }

    protected function runResponsivewithScreenshotTest(Browser $browser, $browserType)
    {
        $this->runResponsiveTest($browser, $browserType, 1024, 768, 'desktop');
        $this->runResponsiveTest($browser, $browserType, 768, 1024, 'tablet');
        $this->runResponsiveTest($browser, $browserType, 375, 667, 'mobile');
    }

    protected function runResponsiveTest(Browser $browser, $browserType, $width, $height, $sizeLabel)
    {
        $browser->resize($width, $height);

        $browser->visit('/dusk')
            ->assertSeeIn('h1', 'Welcome to Laravel Dusk Responsive Test')
            ->assertVisible('@navigation');

        try {
            $browser->screenshot("{$browserType}_{$sizeLabel}_homepage_screenshot");
        } catch (\Exception $e) {
            $browser->screenshot("{$browserType}_{$sizeLabel}_failed_screenshot");
            throw $e; 
        }

        $browser->storeConsoleLog("{$browserType}_{$sizeLabel}_console_output");
    }
}
