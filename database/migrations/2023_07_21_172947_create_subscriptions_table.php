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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->foreignId('created_by_user_id')->constrained('users');
            $table->decimal('affiliate_price_monthly', 8, 2);
            $table->decimal('retail_price_monthly', 8, 2);
            $table->decimal('affiliate_annual', 8, 2);
            $table->decimal('retail_annual', 8, 2);
            $table->unsignedInteger('workspaces');
            $table->unsignedInteger('collaborators');
            $table->unsignedInteger('words');
            $table->unsignedInteger('credits');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
