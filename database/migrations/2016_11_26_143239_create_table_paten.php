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
            $table->integer('biodata_id')->unsigned();
            $table->enum('jenis_paten', ['paten', 'paten_sederhana']);
            $table->string('permohonan_paten_nomor', 50);
            $table->boolean('konsultan_hki');
            $table->text('judul_invensi');
            $table->string('paten_pecahan_nomor')->nullable();
            $table->boolean('hak_prioritas');
            $table->string('surat_kuasa')->nullable();
            $table->string('surat_kepemilikan_invensi_oleh_inventor')->nullable();
            $table->string('surat_pernyataan_invensi_oleh_lembaga')->nullable();
            $table->string('dokumen_prioritas_terjemahan')->nullable();
            $table->integer('reviewer_id')->unsigned();
            $table->enum('status', ['Diterima', 'Proses']);
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
