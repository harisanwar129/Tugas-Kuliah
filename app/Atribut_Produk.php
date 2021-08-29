<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atribut_Produk extends Model
{

    protected $table="atribut";
    protected $fillable=['produk_id','atribut_id','nilai_text','nilai_boolean','nilai_integer','nilai_float','nilai_datetime','nilai_date','nilai_json']; 

  

}
