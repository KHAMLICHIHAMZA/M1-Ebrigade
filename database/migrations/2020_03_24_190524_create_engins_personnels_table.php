<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnginsPersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('engins_personnels', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->integer('Engins_idEngins');
            $table->integer('Personnel_idPersonnel');

            $table->primary(['Personnel_idPersonnel', 'Engins_idEngins'],'my_pks');


            $table->integer('Intervention_Numero_intervention')->nullable();
            $table->integer('Responsable_idResponsable')->nullable();


            $table->foreign('Personnel_idPersonnel')->references('idPersonnel')->on('personnels')->onDelete('cascade');
            $table->foreign('Intervention_Numero_intervention')->references('Numero_Intervention')->on('interventions')->onDelete('cascade');
            $table->foreign('Responsable_idResponsable')->references('idResponsable')->on('responsables')->onDelete('cascade');
            $table->foreign('Engins_idEngins')->references('idEngins')->on('engins')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('engins_personnels');
    }
}
