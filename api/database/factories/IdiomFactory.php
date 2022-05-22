<?php

namespace Database\Factories;

use App\Models\Idiom;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class IdiomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Idiom::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'criadoPor'    => User::factory(),
            'expressao_pt' => $this->faker->realText(),
            'expressao_en' => $this->faker->realText()
        ];
    }
}
