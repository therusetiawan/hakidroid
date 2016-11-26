<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDesainIndustri extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desain_industri', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal_permohonan');
            $table->date('tanggal_penerimaan');
            $table->text('nomor_permohonan');
            $table->integer('biodata_id')->unsigned();
            $table->boolean('konsultan_hki');
            $table->integer('konsultan_hki_id')->unsigned();
            $table->text('judul_desain_industri');
            $table->boolean('hak_prioritas');
            $table->string('negara', 50)->nullable();
            $table->date('tanggal_penerimaan_permohonan_pertama_kali')->nullable();
            $table->string('nomor_prioritas', 50)->nullable();
            $table->string('kelas_desain_industri', 200);
            $table->string('lampiran_surat_kuasa')->nullable();
            $table->string('lampiran_surat_pernyataan_pengalihan_hak')->nullable();
            $table->string('lampiran_bukti_pemilikan_hak')->nullable();
            $table->string('lampiran_bukti_prioritas_dan_terjemahan')->nullable();
            $table->string('lampiran_dokumen_desain_industri')->nullable();
            $table->text('uraian_desian_industri');
            $table->text('contoh_fisik')->nullable();
            $table->timestamps();

            $table->foreign('biodata_id')->references('id')->on('biodata')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('konsultan_hki_id')->references('id')->on('konsultan_hki')->onUpdate('cascade')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('desain_industri', function($table){
            $table->dropForeign(['biodata_id']);
            $table->dropForeign(['konsultan_hki_id']);
        });

        
    }
}
