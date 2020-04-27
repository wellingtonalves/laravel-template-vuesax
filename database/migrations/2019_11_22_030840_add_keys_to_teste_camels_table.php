<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKeysToTesteCamelsTable extends Migration
{
    /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::table('teste_camels', function (Blueprint $table) {
                //$table->foreign('')->references('id')->on('');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::table('teste_camels', function (Blueprint $table) {
                //$table->dropForeign('');
            });
        }
}
