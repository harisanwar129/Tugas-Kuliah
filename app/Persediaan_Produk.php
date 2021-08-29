<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persediaan_Produk extends Model
{

    protected $table="persediaan_produk";
    protected $fillable=['produk_id','atribut_produk_id','jumlah']; 


}
