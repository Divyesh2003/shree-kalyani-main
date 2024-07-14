<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use softDeletes;
    use HasFactory;
    protected $fillable = [
        'id',
        'item_type',
        'name',
        'slug',
        'description',
        'price',
        'supplier_code',
        'supplier_',
        'item_code',
        'hsn_code',
        'image',
        'gallery',
        'video',
        'image_code',
        'design_code',
        'febric',
        'base_color',
        'compitation_color',
        'material_composition',
        'length',
        'blouse',
        'blouse_color',
        'blouse_material',
        'blouse_work',
        'chuni',
        'chuni_color',
        'chuni_material',
        'chuni_work',
        'decdoration',
        'extra_work',
        'irate',
        'rate',
        'discount',
        'patterns',
        'occasion_type',
        'washing_instruction',
        'item_weight',
        'weave_type',
        'meta_title',
        'meta_descipriton',
        'meta_keyword',
        'arraival',
        'supplier_id',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'item_type','id');
    }
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
     // Define the relationship with Supplier
     public function supplier()
     {
         return $this->belongsTo(Supplier::class,'supplier_id','id');
     }
}
