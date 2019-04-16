<?php

namespace Ctrlweb\VoyagerModals\Seeds;

use Illuminate\Database\Seeder;
use TCG\Voyager\Traits\Seedable;

class ModalDatabaseSeeder extends Seeder
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
        $this->seed('Ctrlweb\\VoyagerModals\\Seeds\\ModalDataTypeSeeder');
        $this->seed('Ctrlweb\\VoyagerModals\\Seeds\\ModalDataRowsTableSeeder');
        $this->seed('Ctrlweb\\VoyagerModals\\Seeds\\ModalMenuItemsTableSeeder');
        $this->seed('Ctrlweb\\VoyagerModals\\Seeds\\ModalPermissionRoleTableSeeder');
    }
}
