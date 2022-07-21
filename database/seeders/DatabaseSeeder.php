<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => env('APP_TEST_USERNAME'),
            'email' => env('APP_TEST_EMAIL'),
            'password' => bcrypt(env('APP_TEST_PASSWORD')),

        ]);

        Product::factory()->create(10);
    }
}
