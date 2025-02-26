<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id', 'title', 'description', 'price', 'rooms', 
        'bathrooms','makler_pulu', 'area', 'area_unit', 'address', 'image','status',
         'house_type', 'sale_type','owner_name','owner_contact','faiz_derecesi','sirketin_pulu','makler_faiz'
    
    ];
  

    public function gallery()
    {
        return $this->hasMany(Galery::class, 'home_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
