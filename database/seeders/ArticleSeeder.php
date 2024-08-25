<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $users = $users->filter(function($user){
            return $user->role == 'admin';
        });

        $categories = Category::all();

        foreach($categories as $item){
            for($i = 1; $i <= 3; $i++){
                Article::create([
                    'user_id' => $users->random()->id,
                    'category_id' => $item->id,
                    'title' => $item->name . " Article " . $i,
                    'description' => fake()->paragraph(5),
                    'image' => 'default'.rand(1, 3).'.png'
                ]);
            }
        }
    }
}
