<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKolomTabelPertanyaans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pertanyaans', function (Blueprint $table) {
             $table->text('tags')->nullable();
             $table->integer('jumlah_upvote')->default(0);
             $table->integer('jumlah_downvote')->default(0);
             $table->integer('total_poinvote')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pertanyaans', function (Blueprint $table) {
            //
        });
    }
}
