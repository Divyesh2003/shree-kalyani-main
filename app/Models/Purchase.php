<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
    use softDeletes;
    use HasFactory;
    protected $fillable = [
        'id',
        'date',
        'due_date',
        'vendor_name',
        'vendor_address',
        'vendor_phone',
        'vendor_email',
        'sub_totals',
        'tax',
        'total',
        'created_at',
        'updated_at',
    ];
}
