<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->insert($this->getData());
    }

	private function getData(): array
	{
		 $data = [];
		 $faker = Factory::create();

		 for($i=0; $i < 10; $i++) {
			 $data[] = [
				 'title' => $faker->sentence(5),
				 'description'  => $faker->text(100)
			 ];
		 }

		 return $data;
	}
}
