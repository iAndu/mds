<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'group_id' => App\Group::all()->random()->id,
        'avatar' => 'public/group_avatars/default.png'
    ];
});
