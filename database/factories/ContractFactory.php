<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contract;
use Faker\Generator as Faker;

$factory->define(Contract::class, function (Faker $faker) {

    $mac = implode('.', str_split(substr(md5(mt_rand()), 0, 12), 2));
    $mac = strtoupper($mac);
    $cid = rand(10000, 99999);

    return [
        'mac' => $mac,
        'contract_id' => $cid
    ];
});
