<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('reports', function (Blueprint $table) {
		    $table->increments('report_id');
		    $table->integer('category_id')->unsigned();
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
	    Schema::drop('reports');
    }
}
