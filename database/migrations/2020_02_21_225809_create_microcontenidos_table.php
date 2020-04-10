<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMicrocontenidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('microcontenidos', function (Blueprint $table) {
            /*identificador de la noticia*/ 
            $table->bigIncrements('id')->unique();

            /** El tipo de fuera(habra otro en el JSON) sirve para distinguir 
             * por ejemplo la fuente De origen o en caso de hacer una app multiclub el club
             * o en caso de hacer una app de casas rurales el destino o provincia Etc */
            $table ->string('tipo');
            /* campo json que guardara id,tema,titulo foto,texto.*/ 
            $table->string('titulo');
            $table->string('subtitulo');
            $table->string('texto');

            $table->string('autor');
            /*campo donde se guarda a quien va dirigida la noticia*/ 
            /*$table->unsignedBigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
*/

            $table->datetime('comienza');
            $table->datetime('caduca');
            
            /*campo para crear columna deleted_at*/
            $table->softDeletes();

           

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
        Schema::dropIfExists('microcontenidos');
    }
}
