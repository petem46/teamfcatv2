<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Page;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Page::class, function (Faker $faker) {
    return [
        // 'title' => $faker->catchPhrase,
        // 'subtitle' => $faker->bs,
        'title' => 'New Page',
        'subtitle' => 'A Blank New Page',
        'htmlcontent' => '<p>A blank page to get started</p>',
        'jsoncontent' => '[{"name":"Text Block","id":"704aa47103038","content":"<p>A blank page to get started</p>"}]',
        'slug' => $faker->unique()->slug,
        'state_id' => '3',
        'section_id' => $faker->numberBetween($min = 1, $max = 11),
        'user_id' => $faker->numberBetween($min = 1, $max = 6),
    ];
});
