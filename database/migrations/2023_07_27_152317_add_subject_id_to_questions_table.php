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
        Schema::table('questions', function (Blueprint $table) {
            // Add the 'subject_id' column to the 'questions' table
            $table->unsignedBigInteger('subject_id')->nullable();
            
            // Add a foreign key constraint to link 'subject_id' to the 'id' column in the 'subjects' table
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            // Remove the 'subject_id' column from the 'questions' table
            $table->dropColumn('subject_id');
            
            // Remove the foreign key constraint
            $table->dropForeign(['subject_id']);
        });
    }

};
