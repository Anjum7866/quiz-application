<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('users')->insert([
            'name' => 'teacher',
            'email' => 'teacher@example.com',
            'password' => Hash::make('teacher'), 
            'role' => 'teacher',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $teacherUser = DB::table('users')->where('email', 'teacher@example.com')->first();
        $userId = $teacherUser->id;

        DB::table('user_profiles')->insert([
            'user_id' => $userId,
            'first_name' => 'teacher',
            'email' => 'teacher@example.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_user');
    }
};
