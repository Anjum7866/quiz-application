<?php
namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CookieTest extends DuskTestCase
{
    /**
     * Test setting and retrieving an encrypted cookie.
     */
    public function testEncryptedCookie()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/dusk')
            ->assertSee('Cookie value: Taylor');
    
        });
    }
}
