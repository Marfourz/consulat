<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToLaissezPassersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('laissez_passers', function (Blueprint $table) {
            $table->string('size')->nullable()->change();
            $table->string('hair_color')->nullable();
            $table->string('eye_color')->nullable();
            $table->string('particular_sign')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('laissez_passers', function (Blueprint $table) {
            //
        });
    }
}
