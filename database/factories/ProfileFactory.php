<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{

    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = ['Male', 'Female'];
        $slug = $this->faker->name;
        // $date_of_birth = ['date_format:Y-m-d','before:today'];
        // $phone_number = $this->faker->numerify('##########');
        return [
            'slug' => Str::of($slug)->slug('-'),
            'gender'=>Arr::random($gender),
            'date_of_birth' => $this->faker->dateTimeBetween('1990-01-01', '2012-12-31')
            ->format('Y-m-d'),
            'phone_number' => $this->faker->numerify('##########'),

        ];
    }
}
