<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $fillable = ['product_id','users_id','name_produk', 'kode_produk', 'stock', 'harga'];

    public function users()
    {
        return $this->belongsTo(user::class, 'users_id', 'users_id');
    }
}
