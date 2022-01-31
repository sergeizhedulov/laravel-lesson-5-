<?php

namespace Tests\Feature;

use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsAdminTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testNewsListAvailable()
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
    }

	public function testNewsCreateAvailable()
	{
		$response = $this->get(route('admin.news.create'));

		$response->assertStatus(200);
	}

	public function testNewsStoreJson()
	{
		$faker = Factory::create();
		$data = [
			'title' => 'Hello world',
			'author' => $faker->userName(),
			'status' => 'DRAFT',
			'description' => $faker->text(100)
		];
		$response = $this->post(route('admin.news.store'), $data);

		$response->assertStatus(201);
		$response->assertJson($data);
	}
}
