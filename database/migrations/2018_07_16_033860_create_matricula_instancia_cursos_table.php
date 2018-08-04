<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatriculaInstanciaCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matricula_instancia_cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('alumno_id');
            $table->foreign('alumno_id')
                  ->references('rut')
                  ->on('alumnos')
                  ->onDelete('cascade');
            $table->unsignedInteger('instanciaCurso_id');
            $table->foreign('instanciaCurso_id')
                  ->references('id')
                  ->on('instancia_cursos')
                  ->onDelete('cascade');
            $table->unsignedInteger('estadoMatricula_id');
            $table->foreign('estadoMatricula_id')
                  ->references('id')
                  ->on('estado_matriculas')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('matricula_instancia_cursos');
    }
}
