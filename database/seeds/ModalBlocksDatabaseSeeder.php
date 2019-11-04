<?php

namespace Ctrlweb\VoyagerModals\Seeds;

use Illuminate\Database\Seeder;

class ModalBlocksDatabaseSeeder extends Seeder
{
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
