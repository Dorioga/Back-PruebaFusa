<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('Persona', function (Blueprint $table) {
            $table->unsignedBigInteger('cedula')->primary();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('email')->nullable();
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->date('fecha_nac');
            $table->string('tipo_doc');
            $table->string('contraseña');
            $table->timestamps();
        });

        Schema::create('Publicacion', function (Blueprint $table) {
            $table->bigIncrements('id_publicacion');
            $table->unsignedBigInteger('autor');
            $table->string('titulo');
            $table->string('descripcion');
            $table->string('estado_publicacion');
            $table->timestamps();
            $table->foreign('autor')->references('cedula')->on('Persona');
        });
    }

    public function down()
    {
        Schema::dropIfExists('Publicacion');
        Schema::dropIfExists('Persona');
    }
};
