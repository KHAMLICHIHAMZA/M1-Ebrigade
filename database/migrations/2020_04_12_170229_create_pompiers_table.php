<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePompiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pompiers', function (Blueprint $table) {
            $table->integer('P_ID');
            $table->string('P_CODE')->nullable()->default('NULL');
            $table->string('P_PRENOM');
            $table->string('P_PRENOM2')->nullable()->default('NULL');
            $table->string('P_NOM');
            $table->string('P_NOM_NAISSANCE')->nullable()->default('NULL');
            $table->string('P_SEXE')->default('M');
            $table->tinyInteger('P_CIVILITE')->default('1');
            $table->tinyInteger('P_OLD_MEMBER')->default('0');
            $table->string('P_GRADE')->nullable()->default('NULL');
            $table->string('P_PROFESSION')->default('SPP');
            $table->string('P_STATUT')->default('SPV');
            $table->string('P_MDP')->nullable()->default('NULL');
            $table->tinyInteger('P_PASSWORD_FAILURE')->nullable();
            $table->date('P_DATE_ENGAGEMENT')->nullable();
            $table->date('P_FIN')->nullable();
            $table->smallInteger('P_SECTION')->nullable();
            $table->integer('C_ID')->default('0');
            $table->smallInteger('GP_ID')->default('0');
            $table->smallInteger('GP_ID2')->default('0');
            $table->date('P_BIRTHDATE')->nullable();
            $table->string('P_BIRTHPLACE')->nullable()->default('NULL');
            $table->string('P_BIRTH_DEP')->nullable()->default('NULL');
            $table->string('P_EMAIL')->nullable()->default('NULL');
            $table->smallInteger('P_HORAIRE')->nullable();
            $table->string('P_PHONE')->nullable()->default('NULL');
            $table->string('P_PHONE2')->nullable()->default('NULL');
            $table->string('P_ABBREGE')->nullable()->default('NULL');
            $table->string('P_ADDRESS')->nullable()->default('NULL');
            $table->string('P_ZIP_CODE')->nullable()->default('NULL');
            $table->string('P_CITY')->nullable()->default('NULL');
            $table->string('P_RELATION_PRENOM')->nullable()->default('NULL');
            $table->string('P_RELATION_NOM')->nullable()->default('NULL');
            $table->string('P_RELATION_PHONE')->nullable()->default('NULL');
            $table->string('P_RELATION_MAIL')->nullable()->default('NULL');
            $table->tinyInteger('P_HIDE')->default('1');
            $table->string('P_PHOTO')->nullable()->default('NULL');
            $table->datetime('P_LAST_CONNECT')->nullable();
            $table->integer('P_NB_CONNECT')->default('0');
            $table->tinyInteger('GP_FLAG1')->default('0');
            $table->tinyInteger('GP_FLAG2')->default('0');
            $table->string('TS_CODE')->nullable();
            $table->float('TS_HEURES')->nullable();
            $table->float('TS_JOURS_CP_PAR_AN')->nullable();
            $table->float('TS_HEURES_PAR_AN')->nullable();
            $table->float('TS_HEURES_A_RECUPERER')->nullable();
            $table->tinyInteger('P_NOSPAM')->default('0');
            $table->date('P_CREATE_DATE')->nullable();
            $table->string('SERVICE')->nullable()->default('NULL');
            $table->tinyInteger('TP_ID')->default('0');
            $table->string('MOTIF_RADIATION')->nullable()->default('NULL');
            $table->tinyInteger('NPAI')->default('0');
            $table->date('DATE_NPAI')->nullable();
            $table->string('OBSERVATION')->nullable()->default('NULL');
            $table->tinyInteger('SUSPENDU')->default('0');
            $table->date('DATE_SUSPENDU')->nullable();
            $table->date('DATE_FIN_SUSPENDU')->nullable();
            $table->float('MONTANT_REGUL')->default('0');
            $table->string('P_CALENDAR')->nullable()->default('NULL');
            $table->datetime('P_ACCEPT_DATE')->nullable();
            $table->float('TS_HEURES_PAR_JOUR')->nullable();
            $table->integer('P_MAITRE')->default('0');
            $table->smallInteger('P_PAYS')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pompiers');
    }
}
