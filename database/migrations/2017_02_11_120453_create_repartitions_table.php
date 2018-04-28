<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepartitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repartitions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idenseignant');
            $table->integer('idue');
            $table->integer('idsession');
            $table->string('type');
            $table->date('date');
            $table->enum('decision', ['Normal', 'Accepted','Rejected'])->default('Normal');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repartitions');
    }
}