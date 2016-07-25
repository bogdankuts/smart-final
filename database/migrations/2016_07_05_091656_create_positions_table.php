<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->increments('position_id');
	        $table->integer('category_id')->unsigned();
	        $table->foreign('category_id')
	              ->references('category_id')->on('categories');
	        $table->integer('created_by')->unsigned();
	        $table->foreign('created_by')
	              ->references('id')->on('users');
	        $table->timestamp('published_at');
	        $table->timestamps();
	        $table->integer('views');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('positions');
    }
}
