<?php
namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FormSubmitTest extends DuskTestCase
{
    public function testFormSubmit()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/formsubmit')
                    ->press('#submit-button'); 
        });
    }

}
