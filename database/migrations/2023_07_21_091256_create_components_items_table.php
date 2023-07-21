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
        Schema::create('components_items', function (Blueprint $table) {
            $table->id()->primary();
            $table->foreignId('module_id')->constrained('modules');
            $table->foreignId('component_id')->constrained('components');
            $table->string('item')->nullable()->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->string('icon')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('components_items');
    }
};
