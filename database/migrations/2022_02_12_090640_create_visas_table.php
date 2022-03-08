<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('family_status');
            $table->integer('number_of_children');
            $table->integer('age');
            $table->string('usual_residence');
            $table->string('profession');
          
            $table->string('stop_duration')->nullable();
            $table->string('stay_duration')->nullable();

            $table->dateTime("passport_expiry");
            $table->dateTime("passport_created_at");
            $table->string("passport_number");
            $table->string("passport_created_by");

            $table->dateTime('entry_at');
            $table->text('travel_reason');
          
            $table->char('has_relatives_in_ivoir')->default('0');
        
            $table->text('ivoir_adress_during_staying');
            $table->char('etablish_commerce_in_ivoir')->default('0');
            $table->string('state_destination_after_ivoir');
            
            $table->string('path_plane_ticket')->default('');
            $table->string('path_passport')->default('');
            $table->string('path_letter_invatation_or_hotel_reservation')->default('');
            $table->string('path_picture')->default('');

            $table->timestamps();

            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('visa');
    }
}
