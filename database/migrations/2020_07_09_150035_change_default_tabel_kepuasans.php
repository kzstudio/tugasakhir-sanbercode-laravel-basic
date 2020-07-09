<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDefaultTabelKepuasans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kepuasans', function (Blueprint $table) {
            $table->boolean('upvote')->default(0)->change();
            $table->boolean('downvote')->default(0)->change();
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
        Schema::table('kepuasans', function (Blueprint $table) {
            //
        });
    }
}
