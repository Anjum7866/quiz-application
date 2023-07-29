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
        $user = new User();
        $user->name = 'Admin User';
        $user->email = 'admin@example.com';
        $user->password = Hash::make('password');
        $user->save();

        // Create an admin user (if it doesn't exist already)
        $adminUser = new AdminUser();
        $adminUser->name = 'Admin User';
        $adminUser->email = 'admin@example.com';
        $adminUser->password = Hash::make('password');
        $adminUser->role = 'admin';
        $adminUser->save();
    
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
