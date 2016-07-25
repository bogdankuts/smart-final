<?php

use Illuminate\Database\Seeder;

class FieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
	    DB::table('fields')->insert([
		    'title_ua' => 'СМАРТ-UP',
	        'title_ru' => 'СМАРТ-UP'
	    ]);

	    DB::table('fields')->insert([
		    'title_ua' => 'СМАРТ-MIND',
		    'title_ru' => 'СМАРТ-MIND'
	    ]);

	    DB::table('fields')->insert([
		    'title_ua' => 'СМАРТ-GO',
		    'title_ru' => 'СМАРТ-GO'
	    ]);

    }
}
