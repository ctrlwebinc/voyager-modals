<?php

namespace Ctrlweb\VoyagerModals\Seeds;

use TCG\Voyager\Traits\Seedable;
use Illuminate\Database\Seeder;
use Ctrlweb\VoyagerModals\Seeds\ModalDataTypeSeeder;

class ModalDatabaseSeeder extends Seeder
{
    use Seedable;

    protected $seedersPath = __DIR__ . '/';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seed('Ctrlweb\\VoyagerModals\\Seeds\\ModalDataTypeSeeder');
        $this->seed('Ctrlweb\\VoyagerModals\\Seeds\\ModalMenuItemsTableSeeder');
        $this->seed('Ctrlweb\\VoyagerModals\\Seeds\\ModalPermissionRoleTableSeeder');
    }
}
