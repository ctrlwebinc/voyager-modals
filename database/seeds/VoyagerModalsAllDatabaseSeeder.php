<?php

namespace Ctrlweb\VoyagerModals\Seeds;

use Illuminate\Database\Seeder;
use TCG\Voyager\Traits\Seedable;

class VoyagerModalsAllDatabaseSeeder extends Seeder
{
    use Seedable;

    protected $seedersPath = __DIR__.'/';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seed('Ctrlweb\\VoyagerModals\\Seeds\\ModalDatabaseSeeder');
        $this->seed('Ctrlweb\\VoyagerModals\\Seeds\\ModalBlocksDatabaseSeeder');
    }
}
