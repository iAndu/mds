<?php

use Faker\Generator as Faker;

$factory->define(App\Group::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'user_id' => App\User::all()->random()->id,
        'group_avatar' => 'public/group_avatars/default.png'
    ];
});
