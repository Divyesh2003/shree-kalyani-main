<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class BlogCategory extends Model
{
    use softDeletes;
    use HasFactory;
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
        return $this->belongsTo(BlogCategory::class, 'parent_id','id');
    }
}
