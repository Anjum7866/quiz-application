<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class Register extends DuskTestCase
{
    public function testUserCanRegister()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register') 
            ->assertSee('Register')
                    ->type('name', 'John Doe')
                    ->type('email', 'johndoe@example.com')
                    ->type('password', 'password')
                    ->type('password_confirmation', 'password')
                    ->press('Register');
                    // ->visit('/user/dashboard');
                    //  ->assertPathIs('/home');
        });
    }
}
