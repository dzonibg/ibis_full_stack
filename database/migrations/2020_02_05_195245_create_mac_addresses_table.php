<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMacAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mac_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->macAddress('mac_address');
            $table->dateTime('time');
            $table->integer('bitrate')->nullable(); // 0-200 Mbps
            $table->integer('rss')->nullable(); // -25 - -100 -dBm
            $table->integer('clients')->nullable(); // 0-30
            $table->float('transfer')->nullable(); // x.xx 0.00 - 5.00
            $table->integer('interference_network_rss')->nullable(); //  -dBm
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mac_addresses');
    }
}
