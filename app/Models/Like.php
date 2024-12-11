<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Like extends Pivot
{
    protected $table = "customers_likes_products";
    protected $foreignKey = "customer_id";
    protected $relatedKey = "product_id";
    public $timestamps = false;

    // timestamps sudah false namun masih terbaca true
    // karena Pivot membaca ada kolom created_at maka di anggap timestamps nya true
    // utk menangani hal tsb, perlu di overide / ignore fungsi usesTimestamps nya dengan cara :
    public function usesTimestamps(): bool
    {
        return false;
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
