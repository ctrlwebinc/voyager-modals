<?php

namespace Ctrlweb\VoyagerPageBlocksModals\Facades;

use Illuminate\Support\Facades\Facade;

class VoyagerPageBlocksModals extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'voyager_page_blocks.modals';
    }
}
