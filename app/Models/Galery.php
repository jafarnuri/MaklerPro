<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'home_id',
        'image',
    ];

    public function home()
    {
        return $this->belongsTo(Home::class, 'home_id');
    }
}
