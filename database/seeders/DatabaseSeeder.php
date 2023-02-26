<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Technology'
        ]);
        Category::create([
            'name' => 'Art'
        ],);
        Category::create([
            'name' => 'Business'
        ],);
        Category::create([
            'name' => 'Education'
        ],);
        Category::create([
            'name' => 'Health'
        ],);
        Category::create([
            'name' => 'Social'
        ],);
        Category::create([
            'name' => 'Personal'
        ],);
        Category::create([
            'name' => 'Other'
        ],);
    }
}
