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
    public function testSubjectList()
    {
        $subjects = Subject::factory()->count(5)->create();
        $adminUser = User::factory()->create([
            'role' => 'admin',
        ]);
        $this->actingAs($adminUser);

        $response = $this->get(route('subjects.index'));

        $response->assertStatus(200);

        foreach ($subjects as $subject) {
            $response->assertSee($subject->name);
        }
    }

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

    // public function testSubjectDeletion()
    // {
    //     $adminUser = User::factory()->create([
    //         'role' => 'admin', 
    //     ]);

    //     $subject = Subject::factory()->create();

    //     $this->browse(function (Browser $browser) use ($adminUser, $subject) {
    //         $browser->loginAs($adminUser)
    //                 ->visit(route('subjects.index'));
    //                 //  ->within(".topic[data-subject-id='{$subject->id}']", function ($browser) {
    //                 //     $browser->press('.btn-delete i')
    //                 //             ->acceptDialog()
    //                 //             ->pause(1000); // Adjust pause as needed
    //                 // })
    //                 // ->assertDontSee($subject->name); // Verify subject is deleted
    //     });
    // }
    
}
