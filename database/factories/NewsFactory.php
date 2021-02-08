<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('ru_RU');

        return [
            'title' => $faker->realText(rand(10,20)),
            'text' => $faker->realText(rand(200,500)),
            'isPrivate' => $faker->boolean,
            'image' => null
        ];
    }
}
