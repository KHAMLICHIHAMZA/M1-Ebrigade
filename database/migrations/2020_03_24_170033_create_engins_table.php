<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('engins', function (Blueprint $table) {
            $table->integer('idEngins')->primary();
            $table->string('Nom_Engin',45)->nullable();
            $table->date('Date_Heur_Depart')->nullable();
            $table->date('Date_Heure_Arriver')->nullable();
            $table->date('Date_Heure_Retour')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('engins');
    }
}
