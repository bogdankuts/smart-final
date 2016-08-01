<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'master' => rand(0, 1)
    ];
});

$factory->define(App\Project::class, function (Faker\Generator $faker) use ($factory) {
	return [
		'field_id'              => rand(1, 3),
		'title_ua'              => $faker->sentence,
		'title_ru'              => $faker->sentence,
	];
});

$factory->define(App\Article::class, function (Faker\Generator $faker) use ($factory) {
	return [
		'created_by'        => factory(App\User::class)->create()->id,
		'type_id'           => rand(1, 6),
		'slug'              => $faker->slug,
		'project_id'        => factory(App\Project::class)->create()->project_id,
		'image'             => $faker->image(),
	    'published_at'      => \Carbon\Carbon::now(),
	    'created_at'        => \Carbon\Carbon::now(),
		'updated_at'        => \Carbon\Carbon::now(),
	    'views'             => rand(0, 1500),
	];
});

$factory->define(App\ArticleContent::class, function (Faker\Generator $faker) use ($factory) {
	return [
		'article_id'        => factory(App\Article::class)->create()->article_id,
		'lang_id'           => rand(1, 2),
		'meta_title'        => $faker->sentence,
		'meta_description'  => $faker->sentence,
		'meta_keywords'     => $faker->sentence(10),
		'title'             => $faker->paragraph,
		'body'              => $faker->paragraph(7),
		'preview_text'      => $faker->sentence,
	];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
	return [
		'title_ua' => $faker->sentence(1),
		'title_ru' => $faker->sentence(1),
	];
});

$factory->define(App\Profile::class, function (Faker\Generator $faker) use ($factory) {
	return [
		'category_id'       => factory(App\Category::class)->create()->category_id,
		'created_by'        => rand(1, 22),
		'published_at'      => \Carbon\Carbon::now(),
		'views'             => rand(0, 1500),
	];
});

$factory->define(App\ProfileContent::class, function (Faker\Generator $faker) use ($factory) {
	return [
		'profile_id'        => factory(App\Profile::class)->create()->profile_id,
		'lang_id'           => rand(1, 2),
		'meta_title'        => $faker->sentence,
		'meta_description'  => $faker->sentence,
		'meta_keywords'     => $faker->sentence(10),
		'name'              => $faker->name,
		'description'       => $faker->sentence,
	    'file'              => $faker->image()
	];
});

$factory->define(App\Position::class, function (Faker\Generator $faker) use ($factory) {
	return [
		'category_id'       => factory(App\Category::class)->create()->category_id,
		'created_by'        => rand(1, 22),
		'published_at'      => \Carbon\Carbon::now(),
		'views'             => rand(0, 1500),
	];
});

$factory->define(App\PositionContent::class, function (Faker\Generator $faker) use ($factory) {
	return [
		'position_id'       => factory(App\Position::class)->create()->position_id,
		'lang_id'           => rand(1, 2),
		'meta_title'        => $faker->sentence,
		'meta_description'  => $faker->sentence,
		'meta_keywords'     => $faker->sentence(10),
		'title'             => $faker->sentence,
		'description'       => $faker->sentence,
		'file'              => $faker->image()
	];
});

$factory->define(App\Report::class, function (Faker\Generator $faker) use ($factory) {
	return [
		'category_id'       => rand(1, 2),
		'published_at'      => \Carbon\Carbon::now(),
		'views'             => rand(0, 1500),
	];
});

$factory->define(App\ReportContent::class, function (Faker\Generator $faker) use ($factory) {
	return [
		'report_id'         => factory(App\Report::class)->create()->report_id,
		'lang_id'           => rand(1, 2),
		'meta_title'        => $faker->sentence,
		'meta_description'  => $faker->sentence,
		'meta_keywords'     => $faker->sentence(10),
		'title'             => $faker->sentence,
		'description'       => $faker->sentence,
		'file'              => $faker->image()
	];
});



