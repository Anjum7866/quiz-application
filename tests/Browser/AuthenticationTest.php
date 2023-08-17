<?php
namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class AuthenticationTest extends DuskTestCase
{
    /**
     * A basic authentication test.
     */
    public function testAuthentication()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                  ->visit('/user/dashboard');
    });
        
}
}

