<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDesainIndustriPendesain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desain_industri_pendesain', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 100);
            $table->string('kewarganegaraan', 50);
            $table->integer('desain_industri_id')->unsigned();
            $table->timestamps();

            $table->foreign('desain_industri_id')->references('id')->on('desain_industri')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('desain_industri_pendesain', function($table){
            $table->dropForeign('desain_industri_id');
        });
        
        Schema::dropIfExists('desain_industri_pendesain');
    }
}
