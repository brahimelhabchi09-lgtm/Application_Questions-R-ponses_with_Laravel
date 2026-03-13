<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reponse>
 */
class ReponseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //want to question foreign key
        return [
            'content' => fake()->sentence(),
            'user_id' => User::inRandomOrder()->value('id'),
            'question_id' => Question::inRandomOrder()->value('id'),
        ];
    }
}
