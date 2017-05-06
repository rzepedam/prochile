<?php

$factory->define(ProChile\Assistance::class, function (Faker\Generator $faker)
{
    $firstName   = $faker->firstName;
    $maleSurname = $faker->lastName;
    $email       = $faker->safeEmail;
    $city        = rand(1, 2);
    $industries  = \ProChile\Industry::where('city_id', $city)->get();

    return [
        'user_id'            => 1,
        'type_assistance_id' => rand(1, 3),
        'city_id'            => $city,
        'company_id'         => factory('ProChile\Company')->create()->id,
        'industry_id'        => $industries->random()->id,
        'rut'                => rand(3, 24) . '.' . rand(100, 999) . '.' . rand(100, 999) . '-' . rand(1, 9),
        'first_name'         => $firstName,
        'male_surname'       => $maleSurname,
        'female_surname'     => $faker->lastName,
        'country_id'         => factory('ProChile\Country')->create()->id,
        'phone'              => $faker->e164PhoneNumber,
        'email'              => $email,
    ];
});

$factory->define(ProChile\City::class, function (Faker\Generator $faker)
{
    return [
        'name' => $faker->word
    ];
});

$factory->define(ProChile\Company::class, function (Faker\Generator $faker)
{
    return [
        'user_id' => 1,
        'name'    => $faker->company
    ];
});

$factory->define(ProChile\Country::class, function (Faker\Generator $faker)
{
    return [
        'name' => $faker->word
    ];
});

$factory->define(ProChile\Industry::class, function (Faker\Generator $faker)
{
    return [
        'city_id' => rand(1, 2),
        'name'    => $faker->catchPhrase
    ];
});

$factory->define(ProChile\TypeAssistance::class, function (Faker\Generator $faker)
{
    return [
        'name' => $faker->word
    ];
});

$factory->define(ProChile\User::class, function (Faker\Generator $faker)
{
    static $password;

    return [
        'first_name'     => $faker->name,
        'male_surname'   => $faker->lastName,
        'email'          => $faker->unique()->safeEmail,
        'password'       => $password ?: $password = 'secret',
        'remember_token' => str_random(10),
    ];
});
