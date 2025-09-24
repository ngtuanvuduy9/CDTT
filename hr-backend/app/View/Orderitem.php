<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Product; 

class Orderitem extends Model
{
    protected $fillable = ['orderid', 'productid', 'quantity', 'price'];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'orderid', 'id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'productid', 'id');
    }
}
