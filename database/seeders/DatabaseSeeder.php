<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        $posts = Post::factory(20)->create();
        $faker = Faker::create();


        foreach ($posts as $post) {
            $imageUrl = $faker->imageUrl(640, 480, null, false);
            $post->addMediaFromUrl($imageUrl)->toMediaCollection('images');
        }
    }
}
