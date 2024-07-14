<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use softDeletes;
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'description',
        'amount',
        'date',
        'status',
    ];
}
