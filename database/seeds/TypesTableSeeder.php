<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('types')->insert([
		    'type' => 'article',
		    'type_title' => 'Новость',
	    ]);
	    DB::table('types')->insert([
		    'type' => 'event',
		    'type_title' => 'Событие',
	    ]);
	    DB::table('types')->insert([
		    'type' => 'challenge',
		    'type_title' => 'Конкурс',
	    ]);
	    DB::table('types')->insert([
		    'type' => 'grant',
		    'type_title' => 'Грант',
	    ]);
	    DB::table('types')->insert([
		    'type' => 'project',
		    'type_title' => 'Проект',
	    ]);
	    DB::table('types')->insert([
		    'type' => 'story',
		    'type_title' => 'История успеха',
	    ]);

    }
}
