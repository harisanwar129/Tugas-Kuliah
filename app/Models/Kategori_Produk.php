<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori_Produk extends Model
{
    
    protected $table="kategori_produk";
    protected $fillable=['produk_id','category_id']; 

}
