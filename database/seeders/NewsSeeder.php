<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker;
use App\Models\News;
use App\Models\User;


class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        News::factory()->count(10)->create();

        // factory(News::class, 10)->create();
        // DB::table('news')->insert($this->getData());
    }

    private function getData() {
        $faker = Faker\Factory::create('ru_RU');
        $data = [];
        for ($i=0; $i<=10; $i++) {
            $data[] = [
                'title' => $faker->sentence(rand(3,6)),
                'text' => $faker->realText(rand(200,500)),
                'isPrivate' => $faker->boolean,
                'image' => null
            ];
        }
        return $data;
    }
}
