<?php

namespace Tests;

use Illuminate\Support\Collection;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Laravel\Dusk\TestCase as BaseTestCase;
use Facebook\WebDriver\Remote\WebDriverBrowserType;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Prepare for Dusk test execution.
     *
     * @beforeClass
     */
    public static function prepare(): void
    {
        if (! static::runningInSail()) {
            static::startWebDriver();
        }
    }

    /**
     * Start the appropriate web driver based on the environment.
     */
    protected static function startWebDriver()
    {
        $browser = env('DUSK_BROWSER', 'chrome'); // Default to Chrome

        switch ($browser) {
            case 'firefox':
                static::startFirefoxDriver();
                break;
            case 'edge':
                static::startEdgeDriver();
                break;
            case 'safari':
                static::startSafariDriver();
                break;
            case 'opera':
                static::startOperaDriver();
                break;
            case 'brave':
                static::startBraveDriver();
                break;
    
            case 'chrome':
            default:
                static::startChromeDriver();
                break;
        }
    }

    /**
     * Create the RemoteWebDriver instance.
     */
    protected function driver(): RemoteWebDriver
    {
        $browser = env('DUSK_BROWSER', 'chrome'); // Default to Chrome

        $options = (new ChromeOptions)->addArguments(collect([
            $this->shouldStartMaximized() ? '--start-maximized' : '--window-size=1920,1080',
        ])->unless($this->hasHeadlessDisabled(), function (Collection $items) {
            return $items->merge([
                '--disable-gpu',
                '--headless',
            ]);
        })->all());

        switch ($browser) {
            case 'firefox':
                $capabilities = DesiredCapabilities::firefox();
                $capabilities->setCapability('moz:firefoxOptions', ['args' => $options]);
                break;
            case 'edge':
                $capabilities = DesiredCapabilities::edge();
                // Set any specific Edge capabilities if needed
                break;
            case 'safari':
                $capabilities = DesiredCapabilities::safari();
                // Set any specific Safari capabilities if needed
                break;
            case 'opera':
                $capabilities = DesiredCapabilities::opera();
                // Set any specific Opera capabilities if needed
                break;
            case 'brave':
                $capabilities = DesiredCapabilities::chrome();
                // Set any specific Brave capabilities if needed
                break;    
            case 'chrome':
            default:
                $capabilities = DesiredCapabilities::chrome()->setCapability(
                    ChromeOptions::CAPABILITY, $options
                );
                break;
        }

        return RemoteWebDriver::create(
            $_ENV['DUSK_DRIVER_URL'] ?? 'http://localhost:9515',
            $capabilities
        );
    }

    /**
     * Determine whether the Dusk command has disabled headless mode.
     */
    protected function hasHeadlessDisabled(): bool
    {
        return isset($_SERVER['DUSK_HEADLESS_DISABLED']) ||
               isset($_ENV['DUSK_HEADLESS_DISABLED']);
    }

    /**
     * Determine if the browser window should start maximized.
     */
    protected function shouldStartMaximized(): bool
    {
        return isset($_SERVER['DUSK_START_MAXIMIZED']) ||
               isset($_ENV['DUSK_START_MAXIMIZED']);
    }

}

