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
            $table->date('tanggal_permohonan');
            $table->date('tanggal_penerimaan');
            $table->integer('biodata_id')->unsigned();
            $table->enum('jenis_paten', ['paten', 'paten_sederhana']);
            $table->string('permohonan_paten_nomor', 50);
            $table->string('konsultan')->nullable();
            $table->text('judul_invensi');
            $table->integer('hak_prioritas_id')->unsigned()->nullable();
            $table->string('paten_pecahan_nomor')->nullable();
            $table->string('surat_kuasa')->nullable();
            $table->string('surat_pengalihan_hak_atas_penemuan')->nullable();
            $table->string('surat_kepemilikan_invensi_oleh_inventor')->nullable();
            $table->string('surat_pernyataan_invensi_oleh_lembaga')->nullable();
            $table->string('dokumen_prioritas_terjemahan')->nullable();
            $table->integer('reviewer_id')->unsigned()->nullable();
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
