<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define data to be seeded
        $categories = [
            ['name' => 'Compliance'],
            ['name' => 'Entrepreneurship'],
            ['name' => 'Finances'],
            ['name' => 'Funding'],
            ['name' => 'Marketing and Sales'],
            ['name' => 'Personal Growth'],
        ];

        // Insert data into the database
        foreach ($categories as $category) {
            BlogCategory::create($category);
        }
    }
}
