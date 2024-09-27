<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = Tag::factory(3)->create();
        $category = Category::factory(3)->create();

        Article::factory(20)->hasAttached($tags)->create()->each(function ($article) use ($category) {

            // Assign a random category_id to the article
            $article->category_id = $category->random()->id;
            $article->save();
        });
    }
}
