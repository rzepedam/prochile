<?php

$factory->define(ProChile\Client::class, function (Faker\Generator $faker)
{
    return [
        'first_name'     => $faker->firstName,
        'male_surname'   => $faker->lastName,
        'female_surname' => $faker->lastName,
        'rut'            => rand(3, 24) . '.' . rand(100, 999) . '.' . rand(100, 999) . '-' . rand(1, 9),
        'company_id'     => factory(\ProChile\Company::class)->create()->id,
        'industry_id'    => factory(\ProChile\Industry::class)->create()->id,
        'phone'          => $faker->e164PhoneNumber,
        'email'          => $faker->safeEmail
    ];
});

$factory->define(ProChile\Company::class, function (Faker\Generator $faker)
{
    return [
        'name' => $faker->company
    ];
});

$factory->define(ProChile\Industry::class, function (Faker\Generator $faker)
{
    return [
        'name' => $faker->catchPhrase
    ];
});

$factory->define(ProChile\User::class, function (Faker\Generator $faker)
{
    static $password;

    return [
        'name'           => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'password'       => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
