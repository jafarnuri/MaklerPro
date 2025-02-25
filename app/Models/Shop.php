<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'title', 'description', 'price','makler_pulu', 'area', 'area_unit', 'address', 'image','status', 
        'sale_type','owner_name','owner_contact','faiz_derecesi','sirketin_pulu','makler_faiz'
    
    ];

    public function gallery()
    {
        return $this->hasMany(ShopGalery::class, 'shop_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
