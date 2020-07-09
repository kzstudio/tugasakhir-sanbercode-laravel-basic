<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKolomTabelKepuasaans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kepuasans', function (Blueprint $table) {
            $table->integer('poin_reputasi');
            $table->tinyInteger('resolved')->default(0);
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
            $table->dropColoumn(['poin_reputasi','resolved']);
        });
    }
}
