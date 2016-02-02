<?php namespace Arxmin;

// Composer: "fzaninotto/faker": "v1.3.0"
use Arx\classes\Utils;
use Faker\Factory as Faker;
use App;
use Illuminate\Database\Seeder;

class ArxminDataTableSeeder extends Seeder {

	public function run()
	{
		\Eloquent::unguard();

		$faker = Faker::create();

		# Generate form type

		Post::create([
			'title' => "Page Form",
			'slug' => 'form-1',
			'body' => "Simple Page Form Manager",
			'type' => 'form',
			'meta' => json_encode([
				'manage_type' => [
					'page',
					'article'
				]
			])
		]);

		foreach(range(1, 5) as $index)
		{
			Post::create([
				'title' => $faker->name,
				'slug' => 'post-'.$index,
				'body' => $faker->text(),
				'lang' => App::getLocale(),
				'level' => 0,
				'type' => Utils::randArray(['page', 'post'])
			]);
		}
	}

}