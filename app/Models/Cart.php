<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Product;
class Cart extends Model
{
    use softDeletes;
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'name',
        'image',
        'slug',
        'quantity',
        'price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id','id');
    }
}
