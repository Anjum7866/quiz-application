<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RadioButtonsTest extends DuskTestCase
{
    public function testSelectRadioOption()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/radio-buttons')       
            ->radio('size', 'large')
                    ->press('Submit')
                    ->assertSee('Selected size: large'); 
        });
    }
}
