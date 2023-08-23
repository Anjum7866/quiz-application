<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Dusk\Browser;

class ScreenshotController extends Controller
{
    public function generateScreenshot(Request $request)
    {
        $browser = new Browser();

        $browser->{$request->input('browser')}()
            ->visit($request->input('url'))
            ->screenshot('screenshot.png');

        return "Screenshot generated successfully!";
    }
}
