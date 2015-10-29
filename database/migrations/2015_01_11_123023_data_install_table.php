<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DataInstallTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('datas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('slug')->index('slug')->nullable();
			$table->string('title')->index('title')->nullable();
			$table->text('body')->nullable();
			$table->text('meta')->nullable();
			$table->string('meta_type')->nullable();
			$table->string('ref')->nullable()->index('ref');
			$table->string('lang')->nullable()->index('lang');
			$table->string('type')->index('type');
			$table->string('version')->nullable();
			$table->string('level')->nullable();
			$table->string('position')->nullable();
			$table->text('categories')->nullable()->index('categories');
			$table->text('tags')->nullable()->index('tags');
			$table->string('status')->nullable()->index('status');
			$table->text('context')->nullable();
			$table->text('logs')->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('datas');
	}

}
