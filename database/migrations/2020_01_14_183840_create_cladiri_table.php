<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCladiriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cladiri', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numar_cladire',100);
            $table->unsignedMediumInteger('id_tip_cladire');
            $table->unsignedSmallInteger('nr_apartamente');
            $table->char('cod_postal',6);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cladiri');
    }
}
