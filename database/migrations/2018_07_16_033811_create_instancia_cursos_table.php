<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstanciaCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instancia_cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('agno');
            $table->string('semestre');
            $table->unsignedInteger('curso_id');
            $table->foreign('curso_id')
                  ->references('id')
                  ->on('cursos')
                  ->onDelete('cascade');
            $table->string('profesor_id');
            $table->foreign('profesor_id')
                  ->references('rut')
                  ->on('profesors')
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
        Schema::dropIfExists('instancia_cursos');
    }
}
