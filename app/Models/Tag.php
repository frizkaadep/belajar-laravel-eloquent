<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Tag extends Model
{
    protected $table = 'tags';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    public function products(): MorphToMany
    {
        // taggable untuk ambil tabel taggables
        return $this->morphedByMany(Product::class, 'taggable');
    }

    public function vouchers(): MorphToMany
    {
        return $this->morphedByMany(Voucher::class, 'taggable');
    }
}
