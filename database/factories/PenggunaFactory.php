<?php

use Faker\Generator as Faker;

$factory->define(App\Pengguna::class, function (Faker $faker) {
    return [
        'nama' => 'Administrator Aira',
        'email' => 'admin@aira.com',
        'password' => bcrypt('123'),
        'akses' => 1
    ];
});
