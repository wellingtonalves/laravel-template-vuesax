<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->default(Ramsey\Uuid\Uuid::uuid4());
            $table->unsignedInteger('profile_id');
            $table->unsignedInteger('role_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_roles');
    }
}
