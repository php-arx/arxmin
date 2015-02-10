<?php namespace Arxmin;

// Composer: "fzaninotto/faker": "v1.3.0"
use Arx\classes\Utils;
use Faker\Factory as Faker;
use App;

class ArxminDataTableSeeder extends \Seeder {

	public function run()
	{
		\Eloquent::unguard();

		$faker = Faker::create();

		# Generate form type

		Data::create([
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
			Data::create([
				'title' => $faker->name,
				'slug' => 'post-'.$index,
				'body' => $faker->text(),
				'lang' => App::getLocale(),
				'level' => 0,
				'type' => Utils::randArray(['page', 'article'])
			]);
		}
	}

}