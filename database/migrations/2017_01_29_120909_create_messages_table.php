<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('destinataire');
            $table->integer('expediteur');
            $table->text('contenu');
            $table->string('sujet');
            $table->dateTime('date');
            $table->boolean('supprimer')->default(0);
            $table->boolean('vu')->default(0);
            $table->boolean('valid')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
