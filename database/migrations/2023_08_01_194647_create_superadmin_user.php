<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('admin_users')->insert([
            'name' => 'Superadmin Name',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('superadmin'), // Replace 'password' with the actual password you want to set
            'role' => 'superadmin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
       
        $superadminUserId = DB::table('admin_users')->where('email', 'superadmin@example.com')->value('id');

        DB::table('users')->insert([
            'name' => 'Superadmin Name',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('superadmin'), // Replace 'password' with the actual password you want to set
            'role' => 'superadmin',
            'adminuser_id' => $superadminUserId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $UserId = DB::table('users')->where('adminuser_id', $superadminUserId)->value('id');
        
        DB::table('user_profiles')->insert([
            'user_id' => $UserId,
            'first_name' => 'Superadmin Name',
            'email' => 'superadmin@example.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('superadmin_user');
    }
};
