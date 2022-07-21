<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaissezPassersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laissez_passers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('arrival_at');
            $table->string('size');
            $table->string('ivoir_adress');
            $table->string('father_name',40);
            $table->string('mother_name',40);
            $table->string('parent_adress');
            $table->string('person_to_contact_benin_name',100);
            $table->string('person_to_contact_benin_tel',100);
            $table->string('person_to_contact_ivoir_name',100);
            $table->string('person_to_contact_ivoir_tel',100);
            $table->string("piece_type");
            $table->string("piece_number");
            $table->string("piece_etablish_by");
            $table->string("piece_etablish_at");
            $table->string("piece_etablishment_place");
            $table->string("piece_expiry_at");
            $table->dateTime("passport_extend_from");
            $table->dateTime("passport_extend_to");
            $table->string("passport_extend_by");
            // $table->string('picture',40);
            // $table->string('attestation_residence');
            $table->timestamps();
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            

            $table->string('path_plane_ticket')->default('');
            $table->string('path_passport_expiry')->default('');
            $table->string('path_picture')->default('')->default('');
            $table->string('path_residence_attestation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laissez_passer');
    }
}
