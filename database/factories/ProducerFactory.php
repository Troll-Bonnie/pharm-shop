<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Producer;

class ProducerFactory extends Factory
{
    protected $model = Producer::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $producer_name = $this->faker->unique()->words($nb=2, $asText=true);
        $producer_slug = Str::slug($producer_name);
        return [
            'name' => $producer_name,
            'slug' => $producer_slug
        ];
    }
}
