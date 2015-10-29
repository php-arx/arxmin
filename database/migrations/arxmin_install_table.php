<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InstallArxminTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        # Check users format
        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                if (!Schema::hasColumn('users', 'first_name')) {
                    $table->string('first_name')->nullable();
                }

                if (!Schema::hasColumn('users', 'last_name')) {
                    $table->string('last_name')->nullable();
                }
            });
        } else {
            Schema::create('users', function(Blueprint $table)
            {
                $table->increments('id');
                $table->string('name');
                $table->string('first_name')->nullable();
                $table->string('last_name')->nullable();
                $table->string('email')->unique();
                $table->string('password', 60);
                $table->rememberToken();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('forms')) {
            Schema::create('forms', function(Blueprint $table)
            {
                $table->increments('id');
                $table->string('title')->index('title')->nullable();
                $table->text('description')->nullable();
                $table->text('meta')->nullable();
                $table->string('ref')->nullable()->index('ref');
                $table->string('lang')->nullable()->index('lang');
                $table->string('type')->index('type');
                $table->string('manage')->index('manage');
                $table->string('status')->nullable()->index('status');
                $table->text('context')->nullable();
                $table->text('logs')->nullable();
                $table->timestamps();
            });
        }

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

        if (!Schema::hasTable('posts')) {
            Schema::create('posts', function (Blueprint $table) {
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
                $table->text('categories')->nullable();
                $table->text('tags')->nullable();
                $table->string('status')->nullable()->index('status');
                $table->text('context')->nullable();
                $table->text('logs')->nullable();
                $table->timestamps();
            });
        }


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

        if (!Schema::hasTable('roles')) {
            // Creates the roles table
            Schema::create('roles', function ($table) {
                $table->increments('id')->unsigned();
                $table->string('name')->unique();
                $table->timestamps();
            });

            // Creates the assigned_roles (Many-to-Many relation) table
            Schema::create('assigned_roles', function ($table) {
                $table->increments('id')->unsigned();
                $table->integer('user_id')->unsigned();
                $table->integer('role_id')->unsigned();
                $table->foreign('role_id')->references('id')->on('roles');
            });

            // Creates the permissions table
            Schema::create('permissions', function ($table) {
                $table->increments('id')->unsigned();
                $table->string('name')->unique();
                $table->string('display_name');
                $table->timestamps();
            });

            // Creates the permission_role (Many-to-Many relation) table
            Schema::create('permission_role', function ($table) {
                $table->increments('id')->unsigned();
                $table->integer('permission_id')->unsigned();
                $table->integer('role_id')->unsigned();
                $table->foreign('permission_id')->references('id')->on('permissions'); // assumes a users table
                $table->foreign('role_id')->references('id')->on('roles');
            });
        }

        if(!Schema::hasTable('password_resets')){
            Schema::create('password_resets', function(Blueprint $table)
            {
                $table->string('email')->index();
                $table->string('token')->index();
                $table->timestamp('created_at');
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
        //
    }

}