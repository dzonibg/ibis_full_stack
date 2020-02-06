<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MacAddress;
use Faker\Generator as Faker;

function randomFloat($min = 0, $max = 2) {
    return $min + mt_rand() / mt_getrandmax() * ($max - $min);
}

$factory->define(MacAddress::class, function (Faker $faker) {
    $bitrate = rand(50,150);
    $rss = rand(0,200);
    $clients = rand(0,20);
    $transfer = randomFloat();
    $interference_network_rss = rand(15, 45);
    return [
        'mac_address' => '58.84.96.4A.F5.AD',
        'bitrate' => $bitrate,
        'rss' => $rss,
        'clients' => $clients,
        'transfer' => $transfer,
        'interference_network_rss' => $interference_network_rss,
    ];
});
