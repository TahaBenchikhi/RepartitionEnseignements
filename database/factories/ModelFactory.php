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
    static $password;

    return [
        'id' => '1',
        'idenseignant' =>'1',
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'type' => 'repartiteur',
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Message::class, function (Faker\Generator $faker) {

    return [
        'id' => '1',
        'destinataire' => '1',
        'expediteur' => '1',
        'contenu' => $faker->text,
        'sujet' => $faker->city,
        'date' => $faker->dateTime,
        'supprimer' => 0,
        'vu' => 0,
        'valid' => 0,
    ];
});

$factory->define(App\Enseignant::class, function (Faker\Generator $faker) {

    return [
        'id' => '1',
        'nom' => $faker->name,
        'HTDstat' => $faker->latitude,
        'HTDdues' => $faker->latitude,
        'HTDattrib' => $faker->latitude,
        'delta' => $faker->latitude,
        'PRP' => $faker->latitude,
        'departement' => "Informatique",
        'composante' => $faker->text,
        'corps' => $faker->text,
        'type' => $faker->text,
    ];
});

$factory->define(App\Repartition::class, function (Faker\Generator $faker) {

    return [
        'id' => '1',
        'idenseignant' => '1',
        'idue' => '1',
        'idsession' => '1',
        'type' => 'TD',
        'date' => '2017-01-01',
        'decision' => 'Normal',

    ];
});

$factory->define(App\Ue::class, function (Faker\Generator $faker) {

    return [
        'id' => '1',
        'semestre' => '1',
        'codeue' => $faker->text,
        'nbheuresTD' =>$faker->latitude,
        'nbheuresCour' =>$faker->latitude,
        'nbheuresTP' =>$faker->latitude,
        'nbheuresCM' =>$faker->latitude,
        'nbheuresEStage' =>$faker->latitude,
        'nbheuresAFormation' =>$faker->latitude,
        'libellelong' => $faker->text,
        'libellecourt' => $faker->text,
        'composante' => $faker->text,
        'departement' => $faker->text,


    ];
});

$factory->define(App\Session::class, function (Faker\Generator $faker) {

    return [
        'id' => '1',
        'datedebut' => '2017-02-01',
        'datefin' => '2017-06-31',
        'annee_universitaire' => '2017',

    ];
});



