<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDireccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccions', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('calle');
            $table->string('colonia');
            $table->string('delegacion');
            $table->integer('numero')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->timestamps();

               //Relacion tabla usuarios direccions
               $table->foreign('usuario_id')->references('id')->on('usuarios')
               ->onDelete('cascade')
               ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direccions');
    }
}
