<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Orders;

class Customer extends Authenticatable
{
    use HasFactory;
    use HasApiTokens;

    // Define the table name
    protected $table = 'customers';

    protected $fillable = [
        'name',
        'address',
        'email',
        'contact',
        'password',
    ];

    public function orders()
    {
        return $this->hasMany(Orders::class);
    }
}
