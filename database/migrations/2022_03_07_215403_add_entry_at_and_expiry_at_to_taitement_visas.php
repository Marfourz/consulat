<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEntryAtAndExpiryAtToTaitementVisas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('traitement_visas', function (Blueprint $table) {
            $table->dateTime('entry_at')->nullable();
            $table->dateTime('expiry_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('taitement_visas', function (Blueprint $table) {
            $table->dropColumn('entry_at');
            $table->dropColumn('expiry_at');
        });
    }
}
