<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User; 
use App\Models\Subject; 

use App\Models\Topic; 

class TopicTest extends DuskTestCase
{
   
    /**
     * A basic dusk test example.
     *
     * @return void
     */
    public function testTopicCreation()
    {
        $adminUser = User::factory()->create([
            'role' => 'admin',
        ]);

        $subject = Subject::factory()->create();

        $this->browse(function (Browser $browser) use ($adminUser, $subject) {
            $browser->loginAs($adminUser) 
            ->visit(route('topics.create', $subject->id))
                    ->type('name', 'New Topic Name')
                    ->type('description', 'Topic description goes here.')
                     ->attach('content', storage_path('app/public/images/rmMW7AjJsp8270N7L9Hp3YPZSmtRYTs3ubbDj3mp.jpg')) 
                    ->press('Create Topic');
                    
        });
    }

    public function testTopicEditing()
    {
        $adminUser = User::factory()->create([
            'role' => 'admin', 
        ]);
        $subject = Subject::factory()->create();
        $topic = Topic::factory()->create();

        $this->browse(function (Browser $browser) use ($adminUser, $subject,$topic) {
            $browser->loginAs($adminUser)
                    ->visit(route('topics.edit', $topic->id))
                     ->clear('name')
                      ->type('name', 'Updated Topic Name')
                     ->clear('description')
                     ->type('description', 'Updated topic description goes here.')
                     ->press('Update Topic');
        });
    }

    
}
