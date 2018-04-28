<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
             Schema::create('ues', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('semestre');
            $table->string('codeue');
            $table->float('nbheuresTD')->default(0);
            $table->float('nbheuresCour')->default(0);
            $table->float('nbheuresTP')->default(0);
            $table->float('nbheuresCM')->default(0);
            $table->float('nbheuresEStage')->default(0);
            $table->float('nbheuresAFormation')->default(0);
            $table->string('libellelong');
            $table->string('libellecourt');
            $table->string('composante');
             $table->integer('groupes');
            $table->string('departement')->default('informatique');

                });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('ues');
    }
}
