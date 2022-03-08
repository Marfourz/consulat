<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraitementVisasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traitement_visas', function (Blueprint $table) {
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

            
            $table->unsignedBigInteger('visa_id');

            $table->foreign('visa_id')
                    ->references('id')
                    ->on('visas')
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
        Schema::dropIfExists('traitement_visas');
    }
}
