<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Product extends Model {
    public function casts(): array {
        // hanya cast type yang tidak bisa dibaca php
        return [
            'price' => 'integer',
            'stock' => 'integer',
            'discount_percentage' => 'decimal:2',
            'images' => 'array',
        ];
    }
}
