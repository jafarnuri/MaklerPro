<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'price',
        'area',
        'area_unit',
        'address',
        'image',
        'sale_type',
        'status',
        'latitude',
        'faiz_derecesi',
        'longitude',
        'owner_name',
        'owner_contact',
    ];

    public function images()
    {
        return $this->hasMany(ShopGalery::class, 'shop_id');
    }
}
