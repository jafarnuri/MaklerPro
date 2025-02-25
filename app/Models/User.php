<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
    protected $fillable = ['name', 'image', 'email', 'password', 'role'];


        // Maklerin əlavə etdiyi evlər (Homes)
        public function homes()
        {
            return $this->hasMany(Home::class, 'user_id');
        }
    
        // Maklerin əlavə etdiyi obyektlər (Shops)
        public function shops()
        {
            return $this->hasMany(Shop::class, 'user_id');
        }
}

 