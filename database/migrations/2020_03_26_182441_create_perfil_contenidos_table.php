<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilContenidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfil_contenidos', function (Blueprint $table) {
            $table->bigIncrements('id');


            
            $table->unsignedBigInteger('perfil_id')->unsigned()->index();
            $table->foreign('perfil_id')->references('id')->on('perfiles')->onDelete('cascade');
           
           
            $table->unsignedBigInteger('contenido_id')->unsigned()->index();
            $table->foreign('contenido_id')->references('id')->on('microcontenidos')->onDelete('cascade');

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
        Schema::dropIfExists('perfil_contenidos');
    }
}
