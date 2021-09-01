<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ships', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('sn');
            $table->unsignedInteger('imei');
            $table->string('category', 32);
            $table->string('type', 32);
            $table->string('name', 32);
            $table->integer('customer_id');
            $table->text('deskripsi', 32);
            $table->string('status', 32);
            $table->dateTime('airtime_start');
            $table->dateTime('airtime_end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ships');
    }
}
