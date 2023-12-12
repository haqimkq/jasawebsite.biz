<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'number',
        'total_price',
        'payment_status',
        'snap_token',
    ];
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
