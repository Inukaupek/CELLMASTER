<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'customer_id',
        'mobile_phone_id',
        'quantity',
        'order_amount',
        'payment_method',
        'supplier_id',
        'driver_id',
        'date_of_order',
        'order_status',
    ];
}
