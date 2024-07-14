<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseItem extends Model
{
    use softDeletes;
    use HasFactory;
    protected $fillable = [
        'id',
        'category_id',
        'purchase_id',
        'cost',
        'qty',
        'sub_total',
        'info',
        'created_at',
        'updated_at',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

}
