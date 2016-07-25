<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionsContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions_contents', function (Blueprint $table) {
            $table->increments('id');
	        $table->integer('position_id')->unsigned();
	        $table->foreign('position_id')
	              ->references('position_id')->on('positions')
	              ->onDelete('cascade');
	        $table->integer('lang_id')->unsigned();
	        $table->string('title');
	        $table->string('description', 256);
	        $table->string('file');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('positions_contents');
    }
}
