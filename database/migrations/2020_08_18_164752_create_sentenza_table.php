<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSentenzaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Sentenza', function (Blueprint $table) {
            $table->increments('id');
            $table->string('corte');
            $table->string('numero_data');
            $table->string('giudice');
            $table->longText('caso')->nullable();
            $table->longText('massima')->nullable();
            $table->longText('decisione')->nullable();
            $table->longText('provvedimento')->nullable();
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
        Schema::dropIfExists('Sentenza');
    }
}
