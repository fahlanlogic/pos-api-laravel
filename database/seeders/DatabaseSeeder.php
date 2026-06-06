<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Product::create([
            'name' => 'Palm Sugar Coffee',
            'price' => 25000,
            'size' => 'regular',
            'stock' => 50,
        ]);

        Product::create([
            'name' => 'Palm Sugar Coffee',
            'price' => 30000,
            'size' => 'large',
            'stock' => 30,
        ]);

        Product::create([
            'name' => 'Matcha Latte',
            'price' => 20000,
            'size' => 'regular',
            'stock' => 40,
        ]);
    }
}
