<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *name','gender','classroom_id','religion','address
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->word(),
            'gender'=>fake()->sentence(),
            'classroom_id'=>fake()->word(),
            'religion'=>fake()->word(),
            'address'=>fake()->sentence()
        

        ];
    }
}
