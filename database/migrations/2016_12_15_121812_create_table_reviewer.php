<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableReviewer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviewer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_reviewer', 100);
            $table->string('jabatan', 20);
            $table->string('email', 50);
            $table->string('no_hp', 12);
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
        Schema::drop('reviewer');
    }
}
