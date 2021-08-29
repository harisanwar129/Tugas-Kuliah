<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtributProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atribut_produk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('produk_id');
            $table->unsignedBigInteger('atribut_id');
            $table->text('nilai_text')->nullable();
            $table->boolean('nilai_boolean')->nullable();
            $table->integer('nilai_integer')->nullable();
            $table->decimal('nilai_float')->nullable();
            $table->datetime('nilai_datetime')->nullable();
            $table->date('nilai_date')->nullable();
            $table->text('nilai_json')->nullable();
         

            $table->foreign('produk_id')->references('id')->on('produk')->onDelete('cascade');
            $table->foreign('atribut_id')->references('id')->on('atribut')->onDelete('cascade');
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
        Schema::dropIfExists('atribut_produk');
    }
}
