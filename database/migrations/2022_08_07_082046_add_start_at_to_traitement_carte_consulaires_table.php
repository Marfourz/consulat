<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStartAtToTraitementCarteConsulairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('traitement_carte_consulaires', function (Blueprint $table) {
            $table->dateTime('start_at')->default(now());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('traitement_carte_consulaires', function (Blueprint $table) {
            $table->dropColumn('start_at');
        });
    }
}
