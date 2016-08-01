<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    //$this->call(UsersTableSeeder::class);
	    //$this->call(FieldsTableSeeder::class);
	    //$this->call(LanguagesTableSeeder::class);
	    //$this->call(TypesTableSeeder::class);
	    //$this->call(ArticlesTableSeeder::class);
	    //$this->call(PositionsTableSeeder::class);
	    //$this->call(ProfilesTableSeeder::class);
	    $this->call(ReportsTableSeeder::class);
    }
}
