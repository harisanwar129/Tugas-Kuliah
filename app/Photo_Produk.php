<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo_Produk extends Model
{
    
    protected $table="photo_produk";
    protected $fillable=['produk_id','path']; 

    
}
