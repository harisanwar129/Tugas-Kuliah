<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersediaanProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persediaan_produk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('produk_id');
            $table->unsignedBigInteger('atribut_produk_id');
            $table->integer('jumlah');

            $table->foreign('produk_id')->references('id')->on('produk')->onDelete('cascade');
            $table->foreign('atribut_produk_id')->references('id')->on('atribut_produk')->onDelete('cascade');
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
        Schema::dropIfExists('persediaan_produk');
    }
}
