<?php

namespace App\Models;

use Illuminate\Support\Facades\Date;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Customer extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    public function wallet(): HasOne
    {
        return $this->hasOne(Wallet::class, "customer_id", "id");
    }

    public function virtualAccount(): HasOneThrough
    {
        return $this->hasOneThrough(VirtualAccount::class, Wallet::class, "customer_id", "wallet_id", "id", "id");
        // "customer_id" untuk di dalam wallet nya.
        // "wallet_id" untuk di dalam virtual account nya.
        // "id" untuk di dalam customer nya.
        // "id" untuk di dalam wallet nya.
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, "customer_id", "id");
    }

    public function LikeProducts(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, "customers_likes_products", "customer_id", "product_id")
            ->withPivot("created_at")
            ->using(Like::class);
    }

    public function LikeProductsLastWeek(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, "customers_likes_products", "customer_id", "product_id")
            ->withPivot("created_at")
            ->wherePivot("created_at", ">=", Date::now()->addDays(-7))
            ->using(Like::class);
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, "imageable");
    }
}
