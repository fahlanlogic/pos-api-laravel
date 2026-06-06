<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, HasUuids;

    // Disable auto incrementing karena pakai string uuid
    public $incrementing = false;

    // Tipe data primary key adalah string karena pakai uuid
    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'price',
        'size',
        'stock',
        'image_url',
    ];

    // konversi data otomatis saat JSON digenerate
    protected $casts = [
        'price' => 'integer',
    ];
}
