<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'firstname',
        'lastname',
        'mobile',
        'company',
        'email',
        'bank_details',
        'gst',
        'pan',
        'aadhar',
        'state',
        'city',
        'company',
        'email',
    ];
     // Define the relationship with Product
     public function products()
     {
         return $this->hasMany(Product::class);
     }
}
