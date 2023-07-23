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
        Schema::create('tones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personas_id')->constrained('personas');
            $table->string('tone_1');
            $table->string('tone_2');
            $table->string('tone_3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tones');
    }
};
