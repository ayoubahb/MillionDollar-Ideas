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
            'name' => 'Art and design'
        ],);
        Category::create([
            'name' => 'Business and entrepreneurship'
        ],);
        Category::create([
            'name' => 'Education'
        ],);
        Category::create([
            'name' => 'Health and wellness'
        ],);
        Category::create([
            'name' => 'Social and environmental issues'
        ],);
        Category::create([
            'name' => 'Personal development'
        ],);
    }
}
