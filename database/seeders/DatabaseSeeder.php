<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Commentaire;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Category::create([
        //     'name' => 'Technology'
        // ]);
        // Category::create([
        //     'name' => 'Art'
        // ],);
        // Category::create([
        //     'name' => 'Business'
        // ],);
        // Category::create([
        //     'name' => 'Education'
        // ],);
        // Category::create([
        //     'name' => 'Health'
        // ],);
        // Category::create([
        //     'name' => 'Social'
        // ],);
        // Category::create([
        //     'name' => 'Personal'
        // ],);
        // Category::create([
        //     'name' => 'Other'
        // ],);
        
        // User::create([
        //     "name" => "ayoub",
        //     "dob" => "1997-08-02",
        //     "email" => "ayoubahabbane@gmail.com",
        //     "password" => '$2y$10$kRumJ94qzlClqv3wXMvQUOSVTkXuy1k2Y5wGrrsXzrUQ8VmY7OwL.',
        // ]);

        Post::create([
            'description' => 'Lorem 1 Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum',
            'title' => 'What is Lorem Ipsum 1?',
            'userId' => '1',
        ]);
        Post::create([
            'description' => 'Lorem 2 Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum',
            'title' => 'What is Lorem Ipsum 2?',
            'userId' => '1',
        ]);
        Post::create([
            'description' => 'Lorem 3 Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum',
            'title' => 'What is Lorem Ipsum 3?',
            'userId' => '1',
        ]);

        // Commentaire::create([
        //     "userId" => "1",
        //     "postId" => "1",
        //     "text" => "Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum",
        // ]);

        
    }
}
