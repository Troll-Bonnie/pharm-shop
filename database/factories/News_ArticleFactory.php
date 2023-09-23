<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\News_Article;

class News_ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $article_title = $this->faker->unique()->words($nb=6, $asText=true);
        return [
            'title'                      => $article_title,
            'body'                      => $this->faker->text(200),
        ];
    }
}
