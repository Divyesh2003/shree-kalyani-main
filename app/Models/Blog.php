<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Blog extends Model
{
    use HasFactory;
    use softDeletes;
    protected $fillable = [
        'id',
        'item_type',
        'name',
        'slug',
        'description',
        'image',
        'meta_title',
        'meta_descipriton',
        'meta_keyword',
        'status',
        'created_at',
        'updated_at',
    ];
  
    public function parent()
    {
        return $this->belongsTo(BlogCategory ::class, 'item_type','id');
    }
    
}
