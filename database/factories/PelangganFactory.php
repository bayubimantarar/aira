<?php

use Faker\Generator as Faker;

$factory->define(App\Pelanggan::class, function (Faker $faker) {
    return [
        'nik' => $faker->randomNumber,
        'nama' => $faker->name,
        'alamat' => $faker->address,
        'email' => $faker->freeEmail,
        'nomor_telepon' => $faker->phoneNumber
    ];
});
