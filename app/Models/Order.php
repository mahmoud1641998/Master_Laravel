<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $table = 'orders';

    protected $primaryKey = 'order_id';

    public $timestamps = false;

    protected $fillable = [
        'customer_id',
        'category_id',
        'order_date',
        'total_amount',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'order_date' => 'date',
            'total_amount' => 'decimal:2',
            'created_at' => 'datetime',
        ];
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }
}
