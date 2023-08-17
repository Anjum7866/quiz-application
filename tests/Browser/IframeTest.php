namespace Tests\Browser;

<?php 
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class IframeTest extends DuskTestCase
{
    /**
     * Test interacting with elements within an iframe.
     */
    // public function testInteractWithIframe()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $browser->visit('/iframe-content')
    //                 ->withinFrame('#credit-card-details', function (Browser $iframe) {
    //                     $iframe->type('input[name="cardnumber"]', '4242424242424242')
    //                            ->type('input[name="exp-date"]', '12/24')
    //                            ->type('input[name="cvc"]', '123')
    //                            ->click('#pay-button');
    //                 })
    //                 ->assertSee('Payment Successful'); 
    //     });
    // }
}
