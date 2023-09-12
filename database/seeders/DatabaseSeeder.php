<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use Database\Factories\ProductFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\Product::factory(20)->create();

        \App\Models\User::factory(3)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('123456'),
            'piority' => 'admin'
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Nghia',
            'email' => 'nghia@email.com',
            'password' => bcrypt('123456'),
            'piority' => 'user'
        ]);

        //         Product::factory()->create([
        //             'name' => 'Nike react phantom run flyknit 2',
        //             'price' => 718,
        //             'brand' => 'Nike',
        //             'image' => '',
        //             'size' => 'L',
        //             'category' => 'men',
        //             'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum feugiat mi eget elit elementum, id pulvinar tellus eleifend.

        // Integer porttitor elit id euismod elementum. Nulla vel molestie massa, eget iaculis elit. Quisque a tortor vel lectus ultricies pretium quis non purus. Pellentesque molestie leo eget rutrum tristique.'
        //         ]);
    }
}
