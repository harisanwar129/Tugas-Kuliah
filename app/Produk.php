<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table="produk";
    protected $fillable=['sku','user_id','nama','slug','harga','berat','lebar','dept','deskripsi_pendek','deskripsi','status','status']; 
    
   
}
