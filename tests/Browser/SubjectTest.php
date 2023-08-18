<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User; 
use App\Models\Subject; 

class SubjectTest extends DuskTestCase
{
   
    /**
     * A basic dusk test example.
     *
     * @return void
     */
    public function testSubjectCreation()
    {
        $adminUser = User::factory()->create([
            'role' => 'admin',
        ]);


        $this->browse(function (Browser $browser) use ($adminUser) {
            $browser->loginAs($adminUser) 
            ->visit(route('subjects.create'))
                    ->type('name', 'New Subject Name')
                    ->type('detail', 'Subject detail goes here.')
                     ->attach('image_path', storage_path('app/public/images/rmMW7AjJsp8270N7L9Hp3YPZSmtRYTs3ubbDj3mp.jpg')) 
                    ->script("document.querySelector('[type=submit]').click();");
                    
        });
    }

    public function testSubjectEditing()
    {
        $adminUser = User::factory()->create([
            'role' => 'admin', 
        ]);

        $subject = Subject::factory()->create();

        $this->browse(function (Browser $browser) use ($adminUser, $subject) {
            $browser->loginAs($adminUser)
                    ->visit(route('subjects.edit', $subject->id))
                     ->clear('name')
                      ->type('name', 'Updated Subject Name')
                     ->clear('detail')
                     ->type('detail', 'Updated subject detail goes here.')
                     ->press('Submit');
        });
    }

    
}
