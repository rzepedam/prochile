<?php

$factory->define(ProChile\Assistance::class, function (Faker\Generator $faker)
{
    $firstName   = $faker->firstName;
    $maleSurname = $faker->lastName;
    $email       = $faker->safeEmail;

    return [
        'company_id'     => factory('ProChile\Company')->create()->id,
        'industry_id'    => rand(1, 4),
        'rut'            => rand(3, 24) . '.' . rand(100, 999) . '.' . rand(100, 999) . '-' . rand(1, 9),
        'first_name'     => $firstName,
        'male_surname'   => $maleSurname,
        'female_surname' => $faker->lastName,
        'is_male'        => $faker->randomElement(['0', '1']),
        'country_id'     => rand(1, 10),
        'phone'          => $faker->e164PhoneNumber,
        'email'          => $email,
    ];
});

$factory->define(ProChile\Attendance::class, function (Faker\Generator $faker)
{
    $date = mt_rand(\Carbon\Carbon::createFromTime('08', '30', '00')->timestamp, \Carbon\Carbon::createFromTime('09', '30', '00')->timestamp);

    return [
        'assistance_id' => factory(\ProChile\Assistance::class)->create()->id,
        'rut'           => '',
        'created_at'    => \Carbon\Carbon::createFromFormat('U', $date)->setTimezone("America/Santiago")
    ];
});

$factory->define(ProChile\Company::class, function (Faker\Generator $faker)
{
    return [
        'name' => $faker->company
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
        'name' => $faker->catchPhrase
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
