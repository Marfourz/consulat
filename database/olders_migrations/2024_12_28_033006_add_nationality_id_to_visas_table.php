<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNationalityIdToVisasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visas', function (Blueprint $table) {
            $table->unsignedBigInteger('nationality_id');

            // Définir la clé étrangère vers la table nationalities
            $table->foreign('nationality_id')->references('id')->on('nationalities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visas', function (Blueprint $table) {
            $table->dropForeign(['nationality_id']);
            $table->dropColumn('nationality_id');
        });
    }
}
