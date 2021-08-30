<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnInProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produk', function (Blueprint $table) {
            $table->decimal('lebar',20,2)->nullable()->change();
            $table->decimal('tinggi',20,2)->nullable()->change();
            $table->decimal('ukuran',20,2)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produk', function (Blueprint $table) {
            $table->decimal('lebar',20,2)->nullable(false)->change();
            $table->decimal('tinggi',20,2)->nullable(false)->change();
            $table->decimal('ukuran',20,2)->nullable(false)->change();
        });
    }
}
