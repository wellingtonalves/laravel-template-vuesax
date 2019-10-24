<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKeysToAttachmentRepresentativeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attachment_representative', function (Blueprint $table) {
            $table->foreign('attachment_id')->references('id')->on('attachment');
            $table->foreign('representative_id')->references('id')->on('representatives');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attachment_to_user', function (Blueprint $table) {
            $table->dropForeign('attachment_id');
            $table->dropForeign('representative_id');
        });
    }
}
