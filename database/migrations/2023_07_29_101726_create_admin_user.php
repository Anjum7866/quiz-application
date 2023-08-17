<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\AdminUser;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('admin_users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), 
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
       
        $admin_UserId = DB::table('admin_users')->where('email', 'admin@example.com')->value('id');

        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), 
            'role' => 'admin',
            'adminuser_id' => $admin_UserId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $UserId = DB::table('users')->where('adminuser_id', $admin_UserId)->value('id');
        
        DB::table('user_profiles')->insert([
            'user_id' => $UserId,
            'first_name' => 'Admin User',
            'email' => 'admin@example.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        User::where('email', 'john@example.com')->delete();
        AdminUser::where('email', 'admin@example.com')->delete();
    }
};
