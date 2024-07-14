<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Review extends Model
{   use softDeletes;
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'product_id',
        'rating',
        'message',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
