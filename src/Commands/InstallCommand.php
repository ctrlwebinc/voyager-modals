<?php

namespace Ctrlweb\VoyagerModals\Commands;

use Ctrlweb\VoyagerModals\VoyagerModalsServiceProvider;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Process\Process;
use TCG\Voyager\Traits\Seedable;

class InstallCommand extends Command
{
    use Seedable;

    protected $seedersPath = __DIR__.'/../../database/seeds/';

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'voyager-modals:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the Voyager Modals package';

    /**
     * Get the composer command for the environment.
     *
     * @return string
     */
    protected function findComposer()
    {
        if (file_exists(getcwd().'/composer.phar')) {
            return '"'.PHP_BINARY.'" '.getcwd().'/composer.phar';
        }

        return 'composer';
    }

    public function fire(Filesystem $filesystem)
    {
        return $this->handle($filesystem);
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->info('Publishing Modals assets, database, and config files');
        $this->call('vendor:publish', ['--provider' => VoyagerModalsServiceProvider::class]);

        $this->info('Dumping the autoloaded files and reloading all new files');
        $composer = $this->findComposer();
        $process = new Process($composer.' dump-autoload');
        $process->setWorkingDirectory(base_path())->mustRun();

        $this->info('Migrating the database tables into your application');
        $this->call('migrate');

        $this->info('Seeding required data into the database');
        $this->seed('Ctrlweb\\VoyagerModals\\Seeds\\VoyagerModalsAllDatabaseSeeder');

        $this->info('Successfully installed Voyager Modals!');
    }
}
