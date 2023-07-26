<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        $authorId = $this->faker->randomElement([1, 2]);
        $updatedAt = $this->faker->optional(0.5)->dateTimeThisYear();

        $uniqueIntegers = [];
        $image = $this->faker->unique()->numberBetween(1, 100);
        
        while (in_array($image, $uniqueIntegers)) {
            $image = $this->faker->unique()->numberBetween(1, 100);
        }
        
        $uniqueIntegers[] = $image;
        return [
                'title' => $this->faker->unique()->sentence,
                'slug' => $this->faker->unique()->slug,
                'image' => 'https://picsum.photos/id/'.$image.'/5000/3333',
                'content' => $this->faker->paragraphs(3, true),
                'posted_at' => $this->faker->dateTimeThisYear,
                'updated_at' => $updatedAt,
                'author_id' => $authorId,
                'show' => false,
        ];
    }
}
