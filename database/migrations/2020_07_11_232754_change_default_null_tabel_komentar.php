<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDefaultNullTabelKomentar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('komentars', function (Blueprint $table) {
            $table->unsignedBigInteger('pertanyaan_id')->nullable()->change();
            $table->unsignedBigInteger('jawaban_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('komentars', function (Blueprint $table) {
            //
        });
    }
}
