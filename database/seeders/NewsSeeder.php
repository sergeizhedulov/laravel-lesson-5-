<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		\DB::table('news')->insert($this->getData());
    }

	private function getData(): array
	{
		$data = [];
		$faker = Factory::create();

		for($i=0; $i < 10; $i++) {
			$title = $faker->sentence(5);
			$data[] = [
				'title'  => $title,
				'slug'   => \Str::slug($title),
				'author' => $faker->userName(),
				'description'  => $faker->text(100)
			];
		}

		return $data;
	}
}
