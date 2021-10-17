<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePredizioneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Predizione', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('se_allora');
            $table->integer('id_sentenza')->unsigned();
            $table->integer('id_categoria')->unsigned();
            $table->timestamps();
            
            $table->foreign('id_sentenza')
                    ->references('id')->on('Sentenza');
            $table->foreign('id_categoria')
                    ->references('id')->on('Categoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Predizione');
    }
}
