<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use softDeletes;
    protected $fillable = [
        'id',
        'parent_id',
        'name',
        'slug',
        'description',
        'meta_title',
        'meta_descipriton',
        'meta_keyword',
        'status',
        'created_at',
        'updated_at',
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id','id');
    }
    public function products()
    {
        return $this->hasMany(Product::class,'item_type','id');
    }
}