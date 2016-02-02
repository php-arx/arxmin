<?php namespace Arxmin\commands;

use Arx\classes\Str;
use Arxmin;
use Arxmin\models\User;
use Arxmin\Option;
use Arxmin\SchemaModel;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class UpgradeCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'arxmin:upgrade';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run arxmin upgrade';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $this->info('This will upgrade arxmin database structure');

        if($this->confirm("Do you wish to continue?", true)){
            # Publish Arxmin Migrations
            $this->call('vendor:publish --provider="Arxmin\ArxminServiceProvider" --tag="migrations"');

            if ($this->confirm('Do you wish to run artisan:migrate ? (please make sure that you\'ve run all your migrations first)', true)) {
                $this->call('migrate');
            }
        }
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array(

        );
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array(

        );
    }

}
