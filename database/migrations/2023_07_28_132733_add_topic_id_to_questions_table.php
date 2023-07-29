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
            $table->unsignedBigInteger('topic_id')->nullable();

            // Add a foreign key constraint to link the topic_id to the topics table
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            // Drop the foreign key constraint first before removing the column
            $table->dropForeign(['topic_id']);
            $table->dropColumn('topic_id');
        });

    }
};
