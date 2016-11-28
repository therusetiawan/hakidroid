<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePatenHakPrioritas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paten_hak_prioritas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 100);
            $table->date('tanggal_penerimaan_permohonan');
            $table->string('nomor_prioritas', 50);
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
        Schema::table('paten_hak_prioritas', function($table){
            $table->dropForeign(['paten_id']);
        });
        Schema::dropIfExists('paten_hak_prioritas');
    }
}
