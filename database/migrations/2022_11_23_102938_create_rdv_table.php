<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_d_v_s', function (Blueprint $table) {
            $table->id();
            $table->string('patient_id');
            $table->unsignedbigInteger('medecin_id');
            $table->date('dateRDV');
            $table->string('etat')->default('En attente');
            $table->timestamps();
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('medecin_id')->references('id')->on('medecins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rdv');
    }
};
