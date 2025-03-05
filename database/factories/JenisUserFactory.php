<?php

namespace Database\Factories;

use App\Models\JenisUser;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JenisUser>
 */
class JenisUserFactory extends Factory
{
    protected $model = JenisUser::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'jenis_user' => $this->faker->word,
            'create_by' => $this->faker->name,
            'update_by' => $this->faker->name,
        ];
    }
}
