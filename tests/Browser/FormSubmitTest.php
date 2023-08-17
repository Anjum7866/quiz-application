<?php
namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FormSubmitTest extends DuskTestCase
{
    public function testPressAndWaitForButton()
    {
        // $this->browse(function (Browser $browser) {
        //     $browser->visit('/formsubmit')
        //             ->pressAndWaitFor('#submit-button') // Press the button and wait up to 5 seconds
        //             ->assertSee('Submission Successful'); // Verify the success message
        // });
    }

}
