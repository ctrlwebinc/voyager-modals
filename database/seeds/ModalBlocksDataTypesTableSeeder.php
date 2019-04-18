<?php

namespace Ctrlweb\VoyagerModals\Seeds;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;

class ModalBlocksDataTypesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        DataType::firstOrNew([
            'name' => 'modal_blocks',
            'slug' => 'modal-blocks',
            'display_name_singular' => 'Modal Block',
            'display_name_plural' => 'Modal Blocks',
            'icon' => 'voyager-window-list',
            'model_name' => 'Ctrlweb\VoyagerModals\ModalBlock',
            'controller' => '\Ctrlweb\VoyagerModals\Http\Controllers\ModalBlockController',
            'generate_permissions' => '1',
        ])->save();

        $dataType = $this->dataType('slug', 'modals');

        // Let's hide the body from the modal edit view
        if ($dataType->exists) {
            $body = \TCG\Voyager\Models\DataRow::where('data_type_id', $dataType->id)
                ->where('field', 'body')
                ->firstOrFail();

            $body->type = 'hidden';
            $body->save();
        }
    }

    /**
     * [dataType description].
     *
     * @param [type] $field [description]
     * @param [type] $for   [description]
     *
     * @return [type] [description]
     */
    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }
}
