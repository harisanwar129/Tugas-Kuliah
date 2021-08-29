<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sku');
            $table->unsignedBigInteger('user_id');
            $table->string('nama');
            $table->string('slug');
            $table->decimal('harga',25,2);
            $table->decimal('berat',20,2);
            $table->decimal('lebar',20,2);
            $table->decimal('tinggi',20,2);
            $table->decimal('dept',20,2);
            $table->text('deskripsi_pendek');
            $table->text('deskripsi');
            $table->integer('status');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
