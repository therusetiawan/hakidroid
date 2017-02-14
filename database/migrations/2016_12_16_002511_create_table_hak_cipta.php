<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHakCipta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hak_cipta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('biodata_id')->unsigned();
            $table->string('nama_ciptaan', 255);

            $table->string('pencipta_nama', 100);
            $table->string('pencipta_kewarganegaraan', 50);
            $table->text('pencipta_alamat');

            $table->string('pemegang_hak_cipta_nama', 100);
            $table->string('pemegang_hak_cipta_kewarganegaraan', 50);
            $table->text('pemegang_hak_cipta_alamat');

            $table->string('kuasa_nama', 100);
            $table->string('kuasa_kewarganegaraan', 50);
            $table->text('kuasa_alamat');

            $table->integer('jenis_hak_cipta_id')->unsigned();

            $table->date('tanggal_diumumkan');
            $table->string('tempat_diumumkan', 100);

            $table->text('uraian_ciptaan');
            $table->boolean('status')->default(0);
            $table->integer('reviewer_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('biodata_id')->references('id')->on('biodata')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('jenis_hak_cipta_id')->references('id')->on('jenis_hak_cipta')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hak_cipta', function($table){
            $table->dropForeign(['biodata_id']);
            $table->dropForeign(['jenis_hak_cipta_id']);
        });
        Schema::dropIfExists('hak_cipta');
    }
}
