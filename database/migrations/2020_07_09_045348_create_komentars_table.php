<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('isi');
            $table->unsignedBigInteger('pertanyaan_id');
            $table->unsignedBigInteger('jawaban_id');
            $table->unsignedBigInteger('pemberi_komentar_id');

            $table->foreign('pertanyaan_id')->references('id')->on('pertanyaans');
            $table->foreign('jawaban_id')->references('id')->on('jawabans');
            $table->foreign('pemberi_komentar_id')->references('id')->on('users');
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
        Schema::dropIfExists('komentars');
    }
}
