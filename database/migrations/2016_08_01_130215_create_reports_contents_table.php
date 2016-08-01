<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('reports_contents', function (Blueprint $table) {
		    $table->increments('id');
		    $table->integer('report_id')->unsigned();
		    $table->foreign('report_id')
		          ->references('report_id')->on('reports')
		          ->onDelete('cascade');
		    $table->integer('lang_id')->unsigned();
		    $table->string('meta_title', 80);
		    $table->string('meta_description', 200);
		    $table->string('meta_keywords', 250);
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
	    Schema::drop('reports_contents');
    }
}
