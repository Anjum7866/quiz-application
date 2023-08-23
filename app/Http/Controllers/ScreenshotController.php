<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Dusk\Browser;

class ScreenshotController extends Controller
{
    public function index()
    {
        return view('screenshot-form');
    }

    // public function generateScreenshot(Request $request)
    // {
    //     $browser = new Browser();

    //     $browser->{$request->input('browser')}()
    //         ->visit($request->input('url'))
    //         ->screenshot('screenshot.png');

    //     return "Screenshot generated successfully!";
    // }

    public function generateScreenshot(Request $request)
    {
        $browser = $request->browser;
        $browserVersion = $request->browser_version;
        $resolution = $request->resolution;
        $url = $request->url;

        return $this->runDuskTest($browser, $browserVersion, $resolution, $url);
    }

    private function runDuskTest($browser, $browserVersion, $resolution, $url)
    {
        return Browser::{$browser}(function (Browser $browser) use ($browserVersion, $resolution, $url) {
            $browser->visit($url)
                    ->resize($resolution)
                    ->screenshot("{$browser}_{$browserVersion}_{$resolution}");
        });
    }
}
