<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\UserProfile; 

class ProfileUpdateTest extends DuskTestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testProfileUpdateForm()
    {
        
        $this->browse(function (Browser $browser) {
           
            $profile = UserProfile::factory()->create(); 
            $expectedPath = parse_url(route('profile.edit', $profile->id), PHP_URL_PATH);

            $browser->loginAs($profile)
            ->visit(route('profile.edit', $profile->id))
                 ->attach('avatar', storage_path('app/public/images/rmMW7AjJsp8270N7L9Hp3YPZSmtRYTs3ubbDj3mp.jpg')) 
                ->type('first_name', 'John')
                ->type('last_name', 'Doe')
                ->type('mobile', '1234567890')
                ->type('address', '123 Main St')
                ->type('email', 'john.doe@example.com')
                ->type('skype_url', 'skype.username')
                ->type('instagram_url', 'instagram.username')
                ->type('facebook_url', 'facebook.username')
                ->type('twitter_url', 'twitter.username')
                ->press('Save Profile');
                //  ->assertPathIs($expectedPath) 
                // ->assertSee('Profile updated successfully!'); 
        });
    }
    // public function testProfileUpdateFormWithValidationErrors()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $profile = UserProfile::factory()->create();
    //         $expectedPath = parse_url(route('profile.edit', $profile->id), PHP_URL_PATH);

    //         $browser->loginAs($profile)
    //              ->visit(route('profile.edit', $profile->id))
    //             ->press('Save Profile') 
    //             ->assertPathIs($expectedPath);
    //             // ->assertSee('Whoops! There were some problems with your input.');
    //             // ->assertSee('The last name field is required.')
    //             // ->assertSee('The email field is required.'); 
    //     });
    // }
}
