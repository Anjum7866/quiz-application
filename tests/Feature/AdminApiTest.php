<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Admin;

class AdminApiTest extends TestCase
{
    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();

        // Create an admin record for reuse in test cases
        $this->admin = Admin::create([
            'name' => 'John',
            'email' => 'john1aa@example.com',
        ]);
    }

    public function testCreateAdmin()
    {
        $adminData = [
            'name' => 'Johno',
            'email' => 'johno@example.com',
        ];

        $response = $this->postJson(route('admins.store'), $adminData);

        $response->assertStatus(201);
        $this->assertDatabaseHas('admins', ['email' => 'johno@example.com']);
    }

    public function testReadAdmin()
    {
        $this->admin ;
        $response = $this->getJson(route('admins.show', ['admin' => $this->admin->id]));
        $response->assertStatus(200);

        $response->assertJsonStructure([
            'admin' => [
                'id',
                'name',
                'email',
            ]
    
        ]);
    }

    public function testUpdateAdmin()
    {
        $this->admin ;
        $updatedData = [
            'name' => 'Johny',
            'email' => 'johny123@example.com',
        ];

        $response = $this->putJson(route('admins.update', ['admin' => $this->admin->id]), $updatedData);

        $response->assertStatus(200);
        $this->assertDatabaseHas('admins', ['name' => 'Johny', 'email' => 'johny123@example.com']);
    }

    public function testDeleteAdmin()
    {
        $response = $this->delete(route('admins.destroy', ['admin' => $this->admin->id]));
        $response->assertStatus(200); 
        $this->assertDatabaseMissing('admins', ['id' => $this->admin->id]);
    }
}
