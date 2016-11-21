<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabeKonsultanHki extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konsultan_hki', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_konsultan_hki', 100);
            $table->text('alamat');
            $table->string('nama_badan_hukum', 150);
            $table->text('alamat_badan_hukum');
            $table->text('nomor_badan_hukum');
            $table->string('email', 80);
            $table->string('telepon_fax', 20);
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
        Schema::dropIfExists('konsultan_hki');
    }
}
