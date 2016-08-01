<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles_contents', function (Blueprint $table) {
            $table->increments('id');
	        $table->integer('profile_id')->unsigned();
	        $table->foreign('profile_id')
		        ->references('profile_id')->on('profiles')
		        ->onDelete('cascade');
	        $table->integer('lang_id')->unsigned();
	        $table->string('meta_title', 80);
	        $table->string('meta_description', 200);
	        $table->string('meta_keywords', 250);
	        $table->string('name');
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
        Schema::drop('profiles_contents');
    }
}
