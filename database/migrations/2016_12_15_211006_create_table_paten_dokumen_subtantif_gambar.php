<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePatenDokumenSubtantifGambar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paten_dokumen_subtantif_gambar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_file');
            $table->integer('paten_id')->unsigned();
            $table->timestamps();

            $table->foreign('paten_id')->references('id')->on('paten')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paten_dokumen_subtantif_gambar', function($table){
            $table->dropForeign(['paten_id']);
        });
        
        Schema::dropIfExists('paten_dokumen_subtantif_gambar');
    }
}
