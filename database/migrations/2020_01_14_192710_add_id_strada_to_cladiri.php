<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdStradaToCladiri extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cladiri', function (Blueprint $table) {
            $table->unsignedMediumInteger('id_strada');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cladiri', function (Blueprint $table) {
            $table->dropColumn('id_strada');
        });
    }
}
