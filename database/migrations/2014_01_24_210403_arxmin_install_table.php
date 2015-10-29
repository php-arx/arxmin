<?php

use Illuminate\Database\Migrations\Migration;

use Arxmin\SchemaModel as Schema;

class ArxminInstallTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('options')) {
            Schema::create('options', function($table)
            {
                $table->increments('id');
                $table->string('name')->unique();
                $table->text('value')->nullable();
                $table->string('type')->default('string');
                $table->string('autoload')->default('yes');
                $table->string('context')->nullable();
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
        Schema::drop('options');
    }

}
