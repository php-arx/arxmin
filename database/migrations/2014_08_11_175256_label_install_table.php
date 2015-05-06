<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LabelInstallTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('labels')) {

            Schema::create('labels', function($table)
            {
                $table->increments('id');

                $table->string('ref')->unique();

                $locales = Config::get('app.locales', [Config::get('app.locale')]);

                foreach($locales as $key) {
                    $table->text($key)->nullable();
                }

                $table->text('meta')->nullable();

                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('labels');
    }

}