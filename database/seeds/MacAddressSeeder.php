<?php

use Illuminate\Database\Seeder;

class MacAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $days = 30;
        for ($i=0; $i < 24 * $days; $i++) {
            $datetime = \Carbon\Carbon::now()->subHour($i);

            factory(App\MacAddress::class, 1)->create(['time' => $datetime]);

        }
    }
}
