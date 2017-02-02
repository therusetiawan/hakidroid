<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMerek extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merek', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tgl_masuk');
            $table->string('no_agenda', 20);
            $table->string('untuk_permohonan_merek', 50);
            $table->string('tgl_penerimaan_permohonan', 20);
            $table->integer('biodata_id')->unsigned();
            $table->string('kuasa_nama', 100);
            $table->text('kuasa_alamat');
            $table->string('kuasa_telpon', 20);
            $table->string('kuasa_no_hp', 12);
            $table->string('kuasa_email', 80);
            $table->text('kuasa_alamat_indonesia');
            $table->string('kuasa_nama_negara', 50);
            $table->date('tgl_permohonan');
            $table->text('warna_warna_etiket');
            $table->text('arti_etiket_mererk');
            $table->text('etiket_merek');
            $table->integer('kelas_barang_jasa_id')->unsigned();
            $table->boolean('jenis');
            $table->boolean('status');
            $table->integer('reviewer_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('biodata_id')->references('id')->on('biodata')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('kelas_barang_jasa_id')->references('id')->on('kelas_barang_jasa')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('merek', function($table){
            $table->dropForeign(['biodata_id']);
            $table->dropForeign(['kelas_barang_jasa_id']);
        });
        Schema::dropIfExists('merek');
    }
}
