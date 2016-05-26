<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->integer('profesor_id')->unsigned();
            $table->integer('asistencia_id')->unsigned();

            $table->foreign('profesor_id')->references('id')->on('users');
            $table->foreign('asistencia_id')->references('id')->on('asistencias');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cursos');
    }
}
