<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKepuasansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kepuasans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('like');
            $table->boolean('dislike');
            $table->unsignedBigInteger('pertanyaan_id');
            $table->unsignedBigInteger('jawaban_id');
            $table->unsignedBigInteger('user_id');
<<<<<<< HEAD

=======
                //teskoneksi
>>>>>>> 52252f99cfb3a517e994066461bd47fb7c8ccb18
            $table->foreign('pertanyaan_id')->references('id')->on('pertanyaans');
            $table->foreign('jawaban_id')->references('id')->on('jawabans');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kepuasans');
    }
}
