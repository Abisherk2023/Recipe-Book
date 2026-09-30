<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['name' => 'Breakfast']);
        Category::create(['name' => 'Lunch']);
        Category::create(['name' => 'Dinner']);
        Category::create(['name' => 'Dessert']);
        Category::create(['name' => 'Snacks']);
    }
}