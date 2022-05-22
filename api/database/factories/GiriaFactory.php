<?php

namespace Database\Factories;

use App\Models\Giria;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class GiriaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Giria::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {  
        $generateLocal = '';
        for($i = 0; $i < rand(1, 5); $i++){
            $generateLocal .= "{$this->faker->word()}/";
        }

        $generateSignificados = '';
        for($i = 0; $i < rand(1, 5); $i++){
            $generateSignificados .= "{$this->faker->sentence()};*";
        }
        $generateSignificados = substr($generateSignificados, 0, -1);

        return [
            'criadoPor' => User::factory(),
            'nome' => $this->faker->sentence(),
            'local' => $generateLocal,
            'significados' => $generateSignificados,
            'etimologia' => $this->faker->realText(),
            'imagem' => $this->faker->url(),
            'videoId' => $this->faker->url(),
        ];
    }
}
