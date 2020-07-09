<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeKolomNameTabelKepuasaans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kepuasans', function (Blueprint $table) {
            $table->renameColumn('like','upvote');
            $table->renameColumn('dislike','downvote');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kepuasaans', function (Blueprint $table) {
           
        });
    }
}
