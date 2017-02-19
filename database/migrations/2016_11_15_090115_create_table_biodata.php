<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBiodata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 100);
            $table->string('kewarganegaraan', 50);
            $table->string('npwp', 50)->nullable();
            $table->text('alamat');
            $table->string('email', 80)->unique();
            $table->string('no_hp', 12);
            $table->string('telepon_fax', 20)->nullable();
            $table->string('username', 50)->nullable();
            $table->rememberToken();
            $table->string('api_token', 60);
            $table->string('password');
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
        Schema::dropIfExists('biodata');
    }
}
