<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('profile_id');
	        $table->integer('category_id')->unsigned();
	        $table->foreign('category_id')
	              ->references('category_id')->on('categories');
	        $table->integer('created_by')->unsigned();
	        $table->foreign('created_by')
	              ->references('id')->on('users');
            $table->timestamps();
	        $table->timestamp('published_at');
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
        Schema::drop('profiles');
    }
}
