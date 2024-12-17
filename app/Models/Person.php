<?php

namespace App\Models;

use App\Casts\AsAddress;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Person extends Model
{
    protected $table = 'persons';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = true;

    // berfungsi mengubah type data pada kolom created_at & updated_at di DB nya timestamps
    // di ubah menjadi datetime di laravel nya tanpa merubah di DB nya.
    protected $casts = [
        "address" => AsAddress::class,
        "created_at" => "datetime",
        "updated_at" => "datetime"
    ];

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: function (): string {
                return $this->first_name . ' ' . $this->last_name;
            },

            set: function (string $value): array {
                $names = explode(' ', $value);
                return [
                    'first_name' => $names[0],
                    'last_name' => $names[1] ?? ''
                ];
            }
        );
    }

    protected function firstName(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes): string {
                return strtoupper($value);
            },
            set: function ($value): array {
                return [
                    'first_name' => strtoupper($value)
                ];
            }
        );
    }
}
