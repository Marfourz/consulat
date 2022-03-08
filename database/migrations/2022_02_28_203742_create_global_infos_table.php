<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('global_infos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('price_visa');
            $table->integer('price_carte_consulaire');
            $table->integer('price_laissez_passer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('global_infos');
    }
}
