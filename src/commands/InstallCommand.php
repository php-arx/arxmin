<?php namespace Arxmin\commands;

use Arx\classes\Str;
use Arxmin;
use Arxmin\models\User;
use Arxmin\Option;
use Arxmin\SchemaModel;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class InstallCommand extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'arxmin:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Arxmin package';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $this->info('This will install the Arxmin Package in your project and set a default admin user');

        /*if (!$this->confirm("Do you wish to continue?", true)) {
            $this->info('Goodbye !');
            exit;
        }*/

        /**
         * Step 1 Check if project have arxmin_tables
         */
        if (!SchemaModel::hasTable('arxmin_options')) {
            $this->info('Installing the Arxmin tables');

            # Publish Arxmin Migrations
            exec('php artisan vendor:publish --provider="Arxmin\ArxminServiceProvider" --tag="migrations"');

            if ($this->confirm('Do you wish to run artisan:migrate ? (please make sure that you\'ve run all your migrations first)', true)) {
                $this->call('migrate');
            }
        }

        /**
         * Check the project name
         */
        if (SchemaModel::hasTable('arxmin_options') && !Arxmin::hasOption('project_name')) {
            $project = $this->ask('What\'s the name of your project?');
            Arxmin::setOption('project_name', $project);
            $this->info('Project name setted as ' . $project);
        }

        /**
         * Check if a user is defined. If not, it will create a new one as admin
         */
        if (SchemaModel::hasTable('arxmin_users') &&
            !User::where('role', User::ROLE_ADMIN)->first()
        ) {
            $name = $this->ask('Hi there, what\'s your name?');
            $email = $this->ask('And your email?');
            $password = $this->ask('Please enter your password');
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->password = bcrypt($password);
            $user->role = User::ROLE_ADMIN;
            $user->save();
            $this->info('You are defined as an admin ' . $name);
        }

        if (!file_exists(base_path('modules'))) {
            $this->info('Create modules folder');
            mkdir(base_path('modules'));
        }

        if (!file_exists(storage_path('app/modules'))) {
            $this->info('Create modules folder');
            mkdir(storage_path('app/modules'));
        }

        touch(storage_path('app/modules/modules.used'));

        $modules = Arxmin::getModulesAvailables();

        $list = array_map(function ($item) {
            return $item['name'] . ' : ' . $item['description'];
        }, $modules);

        /**
         * @var $choices Array
         */
        $choices = $this->choice('Do you want to install some available module ? (enter the number separate by comma ex: 0,2)', $list, 0, null, true);

        foreach ($choices as $key => $name) {
            $ref = array_search($name, $list);
            $module = $modules[$ref];
            $result = Arxmin\Module::download($module['link'], $module['name']);
            if ($result) {
                $this->info($module['name'] . ' successfully installed');
            }

            $result = exec('composer dump-autoload');

            if ($result) {
                if ($this->confirm('Would you like to enable the module ?', true)) {
                    $this->call('module:use ' . $module['name']);
                }

                if($this->confirm('Would you like to run the '.$module['name'].' migration ?')){
                    $this->call('module:publish-migrations ' . $module['name']);
                    $this->call('migrate');
                }
            }
        }

        $this->info('Module installed');

        $this->call('module:list');

        $this->info('Arxmin is successfully installed !');

        $this->info('You can go here : '.url('/arxmin/login'));
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array();
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array();
    }

}
