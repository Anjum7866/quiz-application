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
           ['name' => 'math teacher',
           'email' => 'math@example.com',
           'password' => Hash::make('teacher'), 
           'role' => 'teacher',
           'created_at' => now(),
           'updated_at' => now()] ,
           ['name' => 'science teacher',
           'email' => 'science@example.com',
           'password' => Hash::make('teacher'), 
           'role' => 'teacher',
           'created_at' => now(),
           'updated_at' => now()] ,
           ['name' => 'It teacher',
           'email' => 'it@example.com',
           'password' => Hash::make('teacher'), 
           'role' => 'teacher',
           'created_at' => now(),
           'updated_at' => now()] ,
        ]);
        $mathTeacher = DB::table('users')->where('email', 'math@example.com')->first();
       $mathTeacherId = $mathTeacher->id;
       $ItTeacher = DB::table('users')->where('email', 'it@example.com')->first();
       $ItTeacherId = $ItTeacher->id;
   
        $scienceTeacher = DB::table('users')->where('email', 'science@example.com')->first();
        $userId = $scienceTeacher->id;

        DB::table('user_profiles')->insert([
            ['user_id' => $mathTeacherId,
            'first_name' => 'math teacher',
            'email' => 'math@example.com',
            'created_at' => now(),
            'updated_at' => now()],
            ['user_id' => $userId,
            'first_name' => 'science teacher',
            'email' => 'science@example.com',
            'created_at' => now(),
            'updated_at' => now(),],
            ['user_id' => $ItTeacherId,
            'first_name' => 'It teacher',
            'email' => 'it@example.com',
            'created_at' => now(),
            'updated_at' => now()],
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('users')->whereIn('email', ['science@example.com', 'math@example.com', 'it@example.com'])->delete();

      
    }
};
