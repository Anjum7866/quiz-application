<?php
namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ReloadTest extends DuskTestCase
{
    /**
     * Test clicking a button and waiting for page reload.
     */
    public function testReloadPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/dusk') 
                    ->clickAndWaitForReload('@submit-button'); 
                    // ->assertSee('Success!'); 
        });
    }
}
