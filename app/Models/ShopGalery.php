<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopGalery extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'shop_id',
        'image',
    ];

    public function property()
    {
        return $this->belongsTo(Shop::class, 'shop_id');
    }
}
