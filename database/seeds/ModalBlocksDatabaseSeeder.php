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
        $this->call([
            ModalBlocksDataTypesTableSeeder::class,
            ModalBlocksPermissionsTableSeeder::class,
            ModalBlocksPermissionRoleTableSeeder::class,
        ]);
    }
}
