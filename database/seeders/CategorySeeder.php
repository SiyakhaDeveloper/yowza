<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Define categories and seed them
        $categories  = [
          ['name'=>'Finance'],
          ['name'=>'Management'],
          ['name'=>'Marketing and Sales'],
          ['name'=>'Personal Growth'],
          ['name'=>'Customer Service'],
          ['name'=>'Funding'],
          ['name'=>'Entrepreneurship'],
        ];

        //insert  categories into the database
        foreach ($categories as $category)
        {
            Category::create($category);
        }
    }
}
