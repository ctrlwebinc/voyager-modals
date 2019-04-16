<?php

namespace Ctrlweb\VoyagerModals\Seeds;

use TCG\Voyager\Models\Menu;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\MenuItem;

class ModalMenuItemsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        if (file_exists(base_path('routes/web.php'))) {
            require base_path('routes/web.php');

            $menu = Menu::where('name', 'admin')->firstOrFail();

            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title' => 'Modals',
                'url' => '',
                'route' => 'voyager.modals.index',
            ]);

            if (! $menuItem->exists) {
                $menuItem->fill([
                    'target' => '_self',
                    'icon_class' => 'voyager-browser',
                    'color' => null,
                    'parent_id' => null,
                    'order' => 7,
                ])->save();
            }
        }
    }
}
