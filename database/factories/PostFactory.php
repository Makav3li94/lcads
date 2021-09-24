<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $imageUrl = $this->faker->imageUrl(1000,1000, null, false);

        return [
            'user_id'=> User::all()->random()->id,
            'title'=> $this->faker->sentence(),
            'body'=> $this->faker->paragraph(),
        ];
    }
}
