<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraitementCarteConsulairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traitement_carte_consulaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->enum('status', ['accept', 'reject', 'ask_modification', 'modificated']);
            $table->text('comment')->nullable();
            $table->string('document')->nullable();

            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            
            $table->unsignedBigInteger('carte_consulaire_id');

            $table->foreign('carte_consulaire_id')
                    ->references('id')
                    ->on('carte_consulaires')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('traitement_carte_consulaires');
    }
}
