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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('name');
            $table->string('short_description');
            $table->string('avatar');
            $table->string('demographics');
            $table->string('household_structure');
            $table->string('income_level');
            $table->string('location');
            $table->string('communication_pref');
            $table->string('influences');
            $table->string('interest_hobbies');
            $table->string('values');
            $table->string('motivation');
            $table->string('media_consumption');
            // $table->foreignId('submission_id')->constrained('submission');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
