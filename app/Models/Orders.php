<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\MobilePhones;

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

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');

    }

    public function mobile_phone()
    {
        return $this->belongsTo(MobilePhones::class, 'mobile_phone_id');
    }

    public function supplier()
    {
        return $this->belongsTo(User::class, 'supplier_id');
    }

    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }
}
