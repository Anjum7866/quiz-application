<?php
namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class WaitForTextTest extends DuskTestCase
{
    /**
     * Test waiting for specific text to appear.
     */
    public function testWaitForText()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/dusk')
                    ->waitForText('Delayed content') 
                    ->assertSee('Delayed content'); 
        });
    }
}
