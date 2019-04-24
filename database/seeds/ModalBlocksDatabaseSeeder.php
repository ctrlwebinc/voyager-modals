<?php

namespace Ctrlweb\VoyagerModals\Seeds;

use Illuminate\Database\Seeder;
use TCG\Voyager\Traits\Seedable;

class ModalBlocksDatabaseSeeder extends Seeder
{
    use Seedable;
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seed('Ctrlweb\\VoyagerModals\\Seeds\\ModalBlocksDataTypesTableSeeder');
        $this->seed('Ctrlweb\\VoyagerModals\\Seeds\\ModalBlocksPermissionsTableSeeder');
        $this->seed('Ctrlweb\\VoyagerModals\\Seeds\\ModalBlocksPermissionRoleTableSeeder');
    }
}
