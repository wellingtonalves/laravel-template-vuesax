<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->string('cep', 15);
            $table->string('public_place')->comment('logradouro');
            $table->string('complement')->nullable()->comment('complemento');
            $table->string('neighborhood')->comment('bairro');
            $table->string('locality')->comment('localidade');
            $table->char('sg_uf', 2);
            $table->integer('unity')->nullable()->comment('unidade');
            $table->integer('ibge')->nullable();
            $table->integer('gia')->nullable();
            $table->integer('latitude')->nullable();
            $table->integer('longitude')->nullable();

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
        Schema::dropIfExists('address');
    }
}
