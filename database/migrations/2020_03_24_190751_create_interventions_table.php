<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterventionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interventions', function (Blueprint $table) {
            $table->integer('Numero_Intervention');
            $table->string('Commune')->nullable();
            $table->string('Adresse')->nullable();
            $table->string('Type_interv')->nullable();
            $table->string('Opm')->nullable();
            $table->string('Important')->nullable();
            $table->datetime('Date_Heure_Debut')->nullable();
            $table->date('Date_Heure_Fin')->nullable();
            $table->integer('Geographique_idGeographique');
            $table->integer('Responsable_idResponsable')->nullable();

            $table->primary(['Numero_Intervention', 'Geographique_idGeographique'],'my_pkss');


            $table->foreign('Geographique_idGeographique')->references('idGeographique')->on('geographiques')->onDelete('cascade');
            $table->foreign('Responsable_idResponsable')->references('idResponsable')->on('responsables')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interventions');
    }
}
