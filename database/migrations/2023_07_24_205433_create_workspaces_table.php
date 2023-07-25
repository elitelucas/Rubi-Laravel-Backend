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
        Schema::disableForeignKeyConstraints();

        Schema::create('workspaces', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_user_id')->constrained('users');
            $table->foreignId('user_subscription_id')->constrained();
            $table->string('nickname');
            $table->string('short_description');
            $table->boolean('active');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workspaces');
    }
};
