<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'customer_address',
        'total',
        'created_at',
    ];

    /**
     * Get the order details
     */
    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }

}
