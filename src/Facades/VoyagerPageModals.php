<?php

namespace Ctrlweb\VoyagerPageModals\Facades;

use Illuminate\Support\Facades\Facade;

class VoyagerPageModals extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'voyager_page.modals';
    }
}
