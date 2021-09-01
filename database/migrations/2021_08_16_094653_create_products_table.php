<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('sn');
            $table->string('imei', 15);
            $table->string('keterangan', 124)->nullable();
            $table->dateTime('tgl_masuk');
            $table->unsignedInteger('entri_user_masuk');
            $table->unsignedInteger('price');
            $table->dateTime('tgl_keluar')->nullable()->default(null);
            $table->unsignedInteger('entri_user_keluar')->nullable()->default(null);
            $table->dateTime('tgl_edit')->nullable()->default(null);
            $table->unsignedInteger('user_edit')->nullable()->default(null);
            $table->dateTime('tgl_delete')->nullable()->default(null);
            $table->unsignedInteger('user_delete')->nullable()->default(null);
            $table->tinyInteger('flag_delete')->nullable()->default(null);
            $table->unsignedInteger('type_id');
            $table->unsignedInteger('warehouse_id');
            $table->unsignedInteger('status_id');
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
        Schema::dropIfExists('products');
    }
}
