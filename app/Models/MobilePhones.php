<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobilePhones extends Model
{
    use HasFactory;

    protected $table = 'mobile_phones';

    protected $fillable = [
        'name',
        'brand',
        'description',
        'ram',
        'storage',
        'camera',
        'display',
        'image',
        'price',
        'quantity',
        'supplier_id',
        'availability',
    ];

    // Define the relationship with the supplier from user table usig user_role
    public function supplier()
    {
        return $this->belongsTo(User::class, 'supplier_id');
    }
}
