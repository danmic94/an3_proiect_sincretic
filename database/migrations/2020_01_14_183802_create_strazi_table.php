<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStraziTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('strazi', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->string('nume_strada',250)->unique();
            $table->unsignedInteger('id_cartier');
            $table->unsignedInteger('id_tip_strada');
            $table->unsignedMediumInteger('nr_cladiri');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('strazi');
    }
}
