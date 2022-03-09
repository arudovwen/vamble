<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = ['coupon','discount','count','status'];

    public function users(){
        return $this->hasMany(User::class);
    }
}
