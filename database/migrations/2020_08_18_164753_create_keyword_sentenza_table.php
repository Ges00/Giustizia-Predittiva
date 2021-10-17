<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeywordSentenzaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Keyword_Sentenza', function (Blueprint $table) {
            $table->integer('sentenza_id')->unsigned();
            $table->integer('keyword_id')->unsigned();
            
            $table->foreign('sentenza_id')
                    ->references('id')->on('Sentenza');
            $table->foreign('keyword_id')
                    ->references('id')->on('Keyword');
            
            //$table->primary(['id_sentenza', 'id_keyword']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Keyword_Sentenza');
    }
}
