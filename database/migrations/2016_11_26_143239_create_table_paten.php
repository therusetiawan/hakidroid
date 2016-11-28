<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePaten extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paten', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('biodata_id')->unsined();
            $table->string('paten_sederhana');
            $table->string('permohonan_paten_nomor', 50);
            $table->boolean('konsultan_hki');
            $table->text('judul_invensi');
            $table->string('paten_pecahan_nomor')->nullable();
            $table->boolean('hak_prioritas');
            $table->string('surat_kuasa')->nullable();
            $table->string('surat_pengalihan_hak_atas_penemuan')->nullable();
            $table->string('bukti_pemilikan_hak_atas_penemuan')->nullable();
            $table->string('bukti_penunjukan_negara_tujuan')->nullable();
            $table->string('dokumen_prioritas_terjemahan')->nullable();
            $table->string('dokumen_permohonan_paten_internasional')->nullable();
            $table->string('sertifikat_penyimpanan_jasad_renik_terjemahan')->nullable();
            $table->string('uraian_file')->nullable();
            $table->string('klaim_file')->nullable();
            $table->string('abstrak')->nullable();
            $table->string('gambar')->nullable();
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
        Schema::dropIfExists('paten');
    }
}
