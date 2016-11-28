<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePatenDokumenLain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paten_dokumen_lain', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_dokumen_lain', 100);
            $table->string('file_dokumen_lain');
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
        Schema::table('paten_dokumen_lain', function($table){
            $table->dropForeign(['paten_id']);
        });
        
        Schema::dropIfExists('paten_dokumen_lain');
    }
}
