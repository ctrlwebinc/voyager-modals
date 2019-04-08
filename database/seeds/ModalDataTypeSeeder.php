<?php

namespace Ctrlweb\VoyagerModals\Seeds;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Permission;

class ModalDataTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataType = DataType::firstOrNew(['slug' => 'modals']);
        if (! $dataType->exists) {
            $dataType->fill([
                'name' => 'modals',
                'display_name_singular' => 'Modal',
                'display_name_plural' => 'Modals',
                'icon' => 'voyager-window-list',
                'model_name' => 'Ctrlweb\\VoyagerModals\\Modal',
                'controller' => 'Ctrlweb\\VoyagerModals\\Http\\Controllers\\ModalController',
                'generate_permissions' => 1,
                'description' => '',
            ])->save();

            Permission::generateFor('modals');
        }
    }
}
