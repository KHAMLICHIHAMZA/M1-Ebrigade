<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnels', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->integer('idPersonnel');

            $table->string('Nom',45)->nullable();
            $table->string('Role',45)->nullable();
            $table->integer('Responsable_idResponsable');
            $table->integer('Parametre_idParametre');

            $table->primary(['idPersonnel','Responsable_idResponsable', 'Parametre_idParametre'],'my_pks');

            $table->string('P_CODE',20)->nullable();
            $table->foreign('Responsable_idResponsable','fk_resopns')->references('idResponsable')->on('responsables')->onDelete('cascade');
            $table->foreign('Parametre_idParametre','fk_paramidparam')->references('idParametre')->on('parametres')->onDelete('cascade');


        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personnels');
    }
}
