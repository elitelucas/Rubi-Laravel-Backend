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
        Schema::table('address_user', function (Blueprint $table) {
            $table->foreign(['address_type_id'], 'addresses_address_type_id_fkey')->references(['id'])->on('address_types');
            $table->foreign(['user_id'], 'addresses_user_id_fkey')->references(['id'])->on('users');
            $table->foreign(['country_id'], 'addresses_country_id_fkey')->references(['id'])->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->dropForeign('addresses_address_type_id_fkey');
            $table->dropForeign('addresses_user_id_fkey');
        });
    }
};
