<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnseignantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('enseignants', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('nom');
            $table->double('HTDstat', 15, 8);
            $table->double('HTDdues', 15, 8);
            $table->double('HTDattrib', 15, 8);
            $table->double('delta', 15, 8);
            $table->double('PRP', 15, 8);
            $table->string('departement')->default('informatique');
            $table->string('composante');
            $table->string('corps');
            $table->string('type');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enseignants');
    }
}
