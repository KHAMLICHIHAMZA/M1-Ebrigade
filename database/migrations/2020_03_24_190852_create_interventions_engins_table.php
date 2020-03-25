<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterventionsEnginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interventions_engins', function (Blueprint $table) {
         
		$table->integer('Intervention_Numero_Intervention');
        $table->integer('Engins_idEngins');

        $table->primary(['Intervention_Numero_Intervention', 'Engins_idEngins'],'my_pks');

        


        $table->foreign('Engins_idEngins')->references('idEngins')->on('engins')->onDelete('cascade');
        $table->foreign('Intervention_Numero_Intervention')->references('Numero_Intervention')->on('interventions')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interventions_engins');
    }
}
