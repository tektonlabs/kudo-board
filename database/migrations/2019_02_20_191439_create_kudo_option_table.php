<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKudoOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kudo_option', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kudo_id')->unsigned();
            $table->integer('option_id')->unsigned();
            $table->foreign('kudo_id')->references('id')->on('kudos')->onDelete('cascade');
            $table->foreign('option_id')->references('id')->on('options')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kudo_option', function (Blueprint $table) {
            $table->dropForeign('kudos_option_id_foreign');
            $table->dropForeign('options_kudo_id_foreign');
            $table->dropIfExists('kudo_option');
        });
    }
}
