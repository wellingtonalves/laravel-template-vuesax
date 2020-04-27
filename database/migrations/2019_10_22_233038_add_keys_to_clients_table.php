<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKeysToClientsTable extends Migration
{
    /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::table('clients', function (Blueprint $table) {
                //$table->foreign('')->references('')->on('');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::table('clients', function (Blueprint $table) {
                //$table->dropForeign('');
            });
        }
}
