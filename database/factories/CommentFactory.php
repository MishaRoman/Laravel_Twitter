<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Post;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => function () {
                return User::orderBy(DB::raw('RAND()'))->first()->id;
            },
            'post_id' => function () {
                return Post::orderBy(DB::raw('RAND()'))->first()->id;
            },
            'message' => $this->faker->sentence(),
        ];
    }
}
