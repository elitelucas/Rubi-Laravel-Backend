<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign(['country_id'], 'users_country_id_fkey')->references(['id'])->on('countries');
            $table->foreign(['created_by_user_id'], 'users_created_by_user_id_fkey')->references(['id'])->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_country_id_fkey');
            $table->dropForeign('users_created_by_user_id_fkey');
        });
    }
};
