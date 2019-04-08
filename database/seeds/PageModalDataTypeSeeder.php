<?php

namespace Ctrlweb\VoyagerPageModals\Seeds;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Permission;
use TCG\Voyager\Models\Role;

class PageModalDataTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataType = DataType::firstOrNew(['slug' => 'page-modals']);
        if (!$dataType->exists) {
            $dataType->fill([
                'name' => 'page_modals',
                'display_name_singular' => 'Modal',
                'display_name_plural' => 'Modals',
                'icon' => 'voyager-window-list',
                'model_name' => 'Ctrlweb\\VoyagerPageModals\\PageModal',
                'controller' => 'Ctrlweb\\VoyagerPageModals\\Http\\Controllers\\PageModalController',
                'generate_permissions' => 1,
                'description' => '',
            ])->save();

            Permission::generateFor('page_modals');
        }
    }
}
