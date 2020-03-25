<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapports', function (Blueprint $table) {
            $table->increments('id_rapport');
            $table->text('contenu')->nullable();
            $table->integer('Numero_intervention')->nullable();
            $table->string('statut')->nullable();
            $table->date('date')->useCurrent();
            $table->foreign('Numero_intervention')->references('Numero_Intervention')->on('interventions')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rapports');
    }
}
