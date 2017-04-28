<?php

$factory->define(ProChile\Assistance::class, function (Faker\Generator $faker)
{
    $firstName   = $faker->firstName;
    $maleSurname = $faker->lastName;
    $email       = $faker->safeEmail;
    $photos = [
        'https://s3-sa-east-1.amazonaws.com/biometry/faces/2016/12/05/192250513438.jpg',
        'https://s3-sa-east-1.amazonaws.com/biometry/faces/2016/07/18/200031564881.jpg',
        'https://s3-sa-east-1.amazonaws.com/biometry/faces/2016/06/29/163531241838.jpg',
        'https://s3-sa-east-1.amazonaws.com/biometry/faces/2016/12/05/192832116320.jpg',
        'https://s3-sa-east-1.amazonaws.com/biometry/faces/2016/12/05/192515417531.jpg',
        'https://s3-sa-east-1.amazonaws.com/biometry/faces/2016/12/23/150907095676.jpg'
    ];

    return [
        'user_id'            => factory('ProChile\User')->create(['name' => "$firstName $maleSurname", 'email' => $email])->id,
        'position_id'        => factory('ProChile\Position')->create()->id,
        'type_assistance_id' => factory('ProChile\TypeAssistance')->create()->id,
        'city_id'            => factory('ProChile\City')->create()->id,
        'company_id'         => factory('ProChile\Company')->create()->id,
        'industry_id'        => factory('ProChile\Industry')->create()->id,
        'rut'                => rand(3, 24) . '.' . rand(100, 999) . '.' . rand(100, 999) . '-' . rand(1, 9),
        'first_name'         => $firstName,
        'male_surname'       => $maleSurname,
        'female_surname'     => $faker->lastName,
        'country_id'         => factory('ProChile\Country')->create()->id,
        'phone'              => $faker->e164PhoneNumber,
        'email'              => $email,
        'photo'              => $faker->randomElement($photos)
    ];
});

$factory->define(ProChile\City::class, function (Faker\Generator $faker)
{
    return [
        'name' => $faker->word
    ];
});

$factory->define(ProChile\Country::class, function (Faker\Generator $faker)
{
    return [
        'name' => $faker->word
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

$factory->define(ProChile\Position::class, function (Faker\Generator $faker)
{
    return [
        'id'   => null,
        'name' => $faker->word
    ];
});

$factory->define(ProChile\TypeAssistance::class, function (Faker\Generator $faker)
{
    return [
        'id'   => null,
        'name' => $faker->word
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
