<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table="produk";
    protected $fillable=['sku','user_id','nama','slug','harga','berat','lebar','ukuran','tinggi','deskripsi_pendek','deskripsi','status']; 
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function kategori()
    {
        return $this->belongsToMany('App\Models\Category','kategori_produk');
    }

    public static function  status()
    {
        return[
            0=> 'tertunda',
            1=> 'aktif',
            2=> 'tidak_aktif',
        ];
    }

}

