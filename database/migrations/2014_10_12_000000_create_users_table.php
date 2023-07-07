<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->uuid()->index();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->integer('mobile')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('username');
            $table->string('password');
            $table->string('role')->nullable();
            $table
                ->enum('status', [
                    'active',
                    'inactive',
                    'suspended',
                    'terminated',
                    'on_hold',
                ])
                ->default('active')
                ->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('created_by_user_id')->nullable();
            $table->boolean('2fa_verified')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
