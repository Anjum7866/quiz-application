<?php
namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TableTest extends DuskTestCase
{
    /**
     * Test interacting with elements within the .table context.
     */
    public function testInteractWithTable()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/dusk')
                    ->with('.table', function (Browser $table) {
                        $table->assertSee('Hello World')
                              ->clickLink('Delete');
                    });
        });
    }
}
