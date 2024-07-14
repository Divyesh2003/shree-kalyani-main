<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable = [
        'id',
        'user_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'company_name',
        'address_1',
        'address_2',
        'country',
        'state',
        'city',
        'pincode',
        'shipping_first_name',
        'shipping_last_name',
        'shipping_email',
        'shipping_phone',
        'shipping_company',
        'shipping_address_1',
        'shipping_address_2',
        'shipping_country',
        'shipping_state',
        'shipping_city',
        'shipping_pincode',
        'title',
        'description',
        'date',
        'shipment_mode',
        'shipment_note',
        'shipment_status',
        'season',
        'payment_terms',
        'year',
        'total_qty',
        'total_value',
        'payment_mode',
        'remark',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'item_type','id');
    }
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function country_name()
    {
        return $this->belongsTo(Country::class,'country','id');
    }
    public function states()
    {
        return $this->belongsTo(State::class,'state','id');
    }
    public function shipment()
    {
        return $this->hasMany(ShippmentInfo::class);
    }
}
