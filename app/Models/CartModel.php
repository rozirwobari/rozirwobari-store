<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    protected $table = 'cart';
    protected $guarded = [];

    public function produk()
    {
        return $this->belongsTo(ProdukModel::class, 'produk_id', 'id');
    }
}

