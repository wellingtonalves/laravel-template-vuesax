<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKeysToAddressesClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('addresses_client', function (Blueprint $table) {
            $table->foreign('address_id')->references('id')->on('address');
            $table->foreign('client_id')->references('id')->on('client');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('addresses_to_user', function (Blueprint $table) {
            $table->dropForeign('address_id');
            $table->dropForeign('client_id');
        });
    }
}
