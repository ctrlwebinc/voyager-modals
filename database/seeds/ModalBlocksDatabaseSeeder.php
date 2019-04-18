<?php

namespace Ctrlweb\VoyagerModals\Seeds;

use TCG\Voyager\Traits\Seedable;
use Illuminate\Database\Seeder;

class ModalBlocksDatabaseSeeder extends Seeder
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
        $this->seed('Ctrlweb\\VoyagerModals\\Seeds\\ModalBlocksDataTypesTableSeeder');
        $this->seed('Ctrlweb\\VoyagerModals\\Seeds\\ModalBlocksPermissionsTableSeeder');
        $this->seed('Ctrlweb\\VoyagerModals\\Seeds\\ModalBlocksPermissionRoleTableSeeder');
    }
}
